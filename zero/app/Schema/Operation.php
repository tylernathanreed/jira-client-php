<?php

namespace App\Schema;

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

        $successSchema = static::ref(
            $op->responses->{$successCode}->content->{'application/json'}->schema->{'$ref'} ?? null
        )[0] ?? true;

        $bodySchema = static::ref(
            $op->requestBody->content->{'application/json'}->schema->{'$ref'} ?? null
        )[0] ?? null;

        return new static(
            id: $operation['id'],
            uri: $operation['uri'],
            method: $operation['method'],
            description: new Description($op->description ?? null),
            deprecated: $op->deprecated ?? false,
            successCode: $successCode,
            successSchema: $successSchema,
            bodySchema: $bodySchema,
            parameters: isset($op->parameters)
                ? static::makeParameters($op->parameters)
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

        $queryNames = [];
        foreach ($this->parameters as $param) {
            if ($param->location === 'query') {
                $queryNames[] = $param->getSafeName();
            }
        }

        if (! empty($queryNames)) {
            $queryParam = 'compact(\'' . implode('\', \'', $queryNames) . '\')';
        }

        $pathNames = [];
        foreach ($this->parameters as $param) {
            if ($param->location === 'path') {
                $pathNames[] = $param->getSafeName();
            }
        }

        if (! empty($pathNames)) {
            $pathParam = 'compact(\'' . implode('\', \'', $pathNames) . '\')';
        }
    
        $arguments = array_filter([
            ['uri', "'{$this->uri}'"],
            ['method', "'{$this->method}'"],
            ['body', $bodyParam ?? null],
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
            public function {$this->id}({$paramString}): {$returnType}{
                return \$this->call(
        {$argString}
                );
            }
        CODE;
    }

    public function __toString(): string
    {
        return $this->getDoc() . $this->getDefinition();
    }
}
