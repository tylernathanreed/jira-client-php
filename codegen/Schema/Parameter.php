<?php

namespace Jira\CodeGen\Schema;

use Closure;
use RuntimeException;

/**
 * @phpstan-import-type TParameter from Specification
 * @phpstan-import-type TAdditionalProperties from Specification
 */
final class Parameter extends AbstractSchema
{
    use Concerns\ParsesReferences;
    use Concerns\ResolvesSafeNames;

    /** @var array<string,mixed> */
    protected array $computed = [];

    public function __construct(
        public readonly int $index,
        public readonly string $name,
        public readonly Description $description,
        public readonly string $location,
        public readonly ?string $type = null,
        public readonly bool $typeIsRef = false,
        public readonly ?string $format = null,
        public readonly ?string $listableType = null,
        public readonly ?string $associativeType = null,
        public readonly int|string|bool|null $default = null,
        public readonly bool $required = false,

        /** @var ?list<string> */
        public readonly ?array $enum = null,
    ) {
    }

    /** @param TParameter $parameter */
    public static function make(int $index, array $parameter): static
    {
        $type = $parameter['schema']['allOf'][0]['$ref']
            ?? $parameter['schema']['additionalProperties']['$ref']
            ?? $parameter['schema']['type']
            ?? null;

        [$nativeType, $isTypeRef] = self::ref($type);

        $listableType = $parameter['schema']['items']['type'] ?? $parameter['schema']['items']['$ref'] ?? null;

        if ($listableType === 'string' && isset($parameter['schema']['items']['enum'])) {
            $listableType = implode('|', array_map(fn ($enum) => "'{$enum}'", $parameter['schema']['items']['enum']));
        }

        [$nativeListableType, $isListableTypeRef] = self::ref($listableType);

        if ($isListableTypeRef) {
            $nativeListableType = 'Schema\\' . $nativeListableType;
        }

        $associativeType = self::associativeType($parameter['schema']['additionalProperties'] ?? null);

        return new self(
            index: $index,
            name: $parameter['name'],
            description: new Description($parameter['description'] ?? null),
            location: $parameter['in'],
            type: $nativeType,
            typeIsRef: $isTypeRef ?? false,
            format: $parameter['schema']['format'] ?? null,
            listableType: $nativeListableType ?? 'mixed',
            associativeType: $associativeType,
            default: $parameter['schema']['default'] ?? null,
            required: ($parameter['required'] ?? false) || ($parameter['in'] === 'path'),
            enum: $parameter['schema']['enum'] ?? null,
        );
    }

    /** @param TAdditionalProperties|bool|null $type */
    protected static function associativeType(array|bool|null $type): ?string
    {
        if (is_null($type) || ! is_array($type)) {
            return null;
        }

        if (isset($type['$ref'])) {
            return static::ref($type['$ref'])[0];
        }

        if (isset($type['items']['$ref'])) {
            return static::ref($type['items']['$ref'])[0];
        }

        if (isset($type['items']['type'])) {
            return 'list<' . $type['items']['type'] . '>';
        }

        if (isset($type['type'])) {
            return $type['type'];
        }

        return null;
    }

    public function hasType(): bool
    {
        return ! is_null($this->type);
    }

    public function hasSimpleType(): bool
    {
        return in_array($this->type, ['bool', 'int', 'float'])
        || (
            $this->type === 'string' &&
            ! $this->isEnum()
        )
            || (
                $this->type === 'object' &&
                ! $this->isAssociativeArray()
            );
    }

    public function hasRefType(): bool
    {
        return $this->typeIsRef;
    }

    public function isEnum(): bool
    {
        return $this->type === 'string' && ! empty($this->enum);
    }

    public function isArray(): bool
    {
        return $this->type === 'array';
    }

    public function isAssociativeArray(): bool
    {
        return $this->type === 'object' && ! is_null($this->associativeType);
    }

    public function isDateTime(): bool
    {
        return $this->type === 'string' && $this->format === 'date-time';
    }

    public function getNativeType(): string
    {
        return match ($this->type) {
            'number' => 'float',
            'integer' => 'int',
            'boolean' => 'bool',
            'object' => $this->isAssociativeArray() ? 'array' : 'object',
            'string' => $this->isDateTime() ? 'DateTimeImmutable' : 'string',
            null => 'mixed',
            default => $this->type,
        };
    }

    public function getDocType(): ?string
    {
        return $this->compute('docType', fn () => $this->resolveDocType());
    }

    protected function resolveDocType(): ?string
    {
        if (! $this->hasType() || $this->hasSimpleType() || $this->hasRefType()) {
            return null;
        }

        if ($this->isEnum()) {
            return '\'' . implode('\'|\'', $this->enum) . '\'' . ($this->required ? '' : '|null');
        }

        if ($this->isArray()) {
            return ($this->required ? '' : '?') . "list<{$this->listableType}>";
        }

        if ($this->isAssociativeArray()) {
            return 'array<string,' . $this->associativeType . '>';
        }

        throw new RuntimeException(
            'Unable to generate doc type for parameter: ' . json_encode($this)
        );
    }

    public function getSafeName(): string
    {
        return $this->compute('safeName', fn () => static::resolveSafeName($this->name));
    }

    public function getDefaultString(): string
    {
        if (is_null($this->default)) {
            return 'null';
        }

        if (is_string($this->default)) {
            return "'{$this->default}'";
        }

        if (is_bool($this->default) || $this->type === 'bool') {
            return $this->default ? 'true' : 'false';
        }

        return (string) $this->default;
    }

    public function getDoc(): string
    {
        $definition = strtr('{docType} ${name}', [
            '{docType}' => $this->getDocType() ?: $this->getNativeType(),
            '{name}' => $this->getSafeName(),
        ]);

        $indent = $this->isEnum()
            ? str_repeat(' ', strlen('@param '))
            : str_repeat(' ', strlen($definition) + strlen('@param ') + 1);

        $description = str_replace(
            ["     * \n", '     * '],
            ['', '     * ' . $indent],
            rtrim(ltrim((string) $this->description->render(4), "/* \n"), " */\n")
        );

        return $this->isEnum()
            ? $definition . "\n     *        " . $description
            : $definition . ' ' . $description;
    }

    public function getDefinition(): string
    {
        $indent = str_repeat(' ', 8);

        return strtr('{indent}{nullable}{phpType} ${name}{default},', [
            '{indent}' => $indent,
            '{nullable}' => $this->required || is_null($this->type) ? '' : '?',
            '{phpType}' => $this->getNativeType(),
            '{name}' => $this->getSafeName(),
            '{default}' => ! is_null($this->default)
                ? " = {$this->getDefaultString()}"
                : ($this->required ? '' : ' = null'),
        ]);
    }

    /**
     * @phpstan-template T
     *
     * @param Closure():T $callback
     *
     * @return T
     */
    protected function compute(string $key, Closure $callback): mixed
    {
        if (array_key_exists($key, $this->computed)) {
            return $this->computed[$key];
        }

        return $this->computed[$key] = $callback();
    }
}
