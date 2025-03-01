<?php

namespace Jira\CodeGen\Schema;

use Stringable;

/**
 * @phpstan-import-type TOperationArray from Specification
 * @phpstan-import-type TOperationObject from Specification
 * @phpstan-import-type TParameterObject from Parameter
 */
final class Operation extends AbstractSchema implements Stringable
{
    use Concerns\ParsesReferences;

    public function __construct(
        public readonly string $id,
        public readonly string $uri,
        public readonly string $method,
        public readonly Description $description,
        public readonly int $successCode,

        /** @var class-string<Dto>|true */
        public readonly string|true $successSchema,

        /** @var ?class-string<Dto> */
        public readonly ?string $bodySchema,

        /** @var list<Parameter> */
        public readonly array $parameters,
        public readonly bool $deprecated = false,
    ) {
    }

    /** @param TOperationArray $operation */
    public static function make(array $operation): static
    {
        $op = $operation['operation'];

        $responseCodes = array_keys((array) $op->responses);

        $successCode = count($responseCodes) > 1
            ? min(...$responseCodes)
            : $responseCodes[0];

        $successSchema = self::ref(
            $op->responses->{$successCode}->content->{'application/json'}->schema->{'$ref'} ?? null
        )[0] ?? true;

        $bodySchema = self::ref(
            $op->requestBody->content->{'application/json'}->schema->{'$ref'} ?? null
        )[0] ?? null;

        return new self(
            id: $operation['id'],
            uri: $operation['uri'],
            method: $operation['method'],
            description: new Description($op->description ?? null),
            deprecated: $op->deprecated ?? false,
            successCode: $successCode,
            successSchema: $successSchema,
            bodySchema: $bodySchema,
            parameters: isset($op->parameters)
                ? self::makeParameters($op->parameters)
                : [],
        );
    }

    /**
     * @param list<TParameterObject>
     * @return list<Parameter>
     */
    protected static function makeParameters(array $parameters): array
    {
        $parameters = array_map(
            fn ($param, $i) => Parameter::make($i, $param),
            $parameters,
            array_keys($parameters)
        );

        usort($parameters, function (Parameter $a, Parameter $b) {
            if (($c = $b->required <=> $a->required) !== 0) {
                return $c;
            }

            if ($b->required && $a->required) {
                if (($c = ! is_null($a->default) <=> ! is_null($b->default)) !== 0) {
                    return $c;
                }
            }

            return $a->index <=> $b->index;
        });

        return $parameters;
    }

    public function getDoc(): ?string
    {
        $tags = [];

        foreach ($this->parameters as $param) {
            $tags[] = ['param', $param->getDoc()];
        }

        return $this->description->render(
            indent: 4,
            tags: $tags,
        );
    }

    public function getDefinition(): string
    {
        $returnType = $this->successSchema === true
            ? 'true'
            : "Schema\\{$this->successSchema}";

        $schema = $this->successSchema === true
            ? $returnType
            : "{$returnType}::class";

        $parameters = [];

        if ($this->bodySchema) {
            $parameters[] = '        Schema\\' . $this->bodySchema . ' $request,';

            $bodyParam = '$request';
        }

        foreach ($this->parameters as $param) {
            $parameters[] = $param->getDefinition();
        }

        $queryParam = $this->getCallParamString('query');
        $pathParam = $this->getCallParamString('path');
        $headerParam = $this->getCallParamString('header');

        $arguments = array_filter([
            ['uri', "'{$this->uri}'"],
            ['method', "'{$this->method}'"],
            ['body', $bodyParam ?? null],
            ['header', $headerParam ?? null],
            ['query', $queryParam ?? null],
            ['path', $pathParam ?? null],
            ['success', $this->successCode],
            ['schema', $schema],
        ], fn ($arg) => ! empty($arg[1]));

        $indent = str_repeat(' ', 12);
        $argString = implode("\n", array_map(fn ($arg) => "{$indent}{$arg[0]}: {$arg[1]},", $arguments));

        $indent = str_repeat(' ', 8);
        $paramString = implode("\n", $parameters);

        if (! empty($paramString)) {
            $paramString = "\n" . $paramString . "\n    ";
            $returnType .= ' ';
        } else {
            $returnType = rtrim($returnType) . "\n    ";
        }

        return <<<CODE
            public function {$this->getSafeId()}({$paramString}): {$returnType}{
                return \$this->call(
        {$argString}
                );
            }
        CODE;
    }

    protected function getCallParamString(string $location): ?string
    {
        $compact = [];
        $append = [];

        foreach ($this->parameters as $param) {
            if ($param->location !== $location) {
                continue;
            }

            $safeName = $param->getSafeName();

            if ($param->name === $safeName) {
                $compact[] = $safeName;
            } else {
                $append[] = [$param->name, $safeName];
            }
        }

        if (empty($compact) && empty($append)) {
            return null;
        }

        $compactStr = ! empty($compact)
            ? 'compact(\'' . implode('\', \'', $compact) . '\')'
            : null;

        $appendStr = ! empty($append)
            ? '[' . implode(', ', array_map(fn ($a) => "'{$a[0]}' => \${$a[1]}", $append)) . ']'
            : null;

        if (empty($compactStr)) {
            return $appendStr;
        }

        if (empty($appendStr)) {
            return $compactStr;
        }

        return '[...' . $compact . ', ...(' . $appendStr . ')]';
    }

    public function getSafeId(): string
    {
        $id = str_replace([
            '_get',
            '_post',
            '_put',
            '_patch',
            '_delete',
        ], '', $this->id);

        if (($position = strpos($id, '.')) !== false) {
            $id = substr($id, $position + 1);
        }

        return lcfirst($id);
    }

    public function __toString(): string
    {
        return $this->getDoc() . $this->getDefinition();
    }
}
