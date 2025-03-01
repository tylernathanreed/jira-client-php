<?php

namespace Jira\CodeGen\Schema;

use RuntimeException;
use Throwable;

/**
 * @phpstan-import-type TPropertyObject from Property
 *
 * @phpstan-type TSchemaObject object{
 *     description?: string,
 *     properties?: object,
 *     required?: list<string>,
 *     discriminator?: object{mapping:object,propertyName:string}
 *     oneOf?: list<object{'$ref':string}>
 *     anyOf?: list<object{'$ref':string}>
 *     type: string,
 *     nullable?: bool,
 * }
 */
final class Schema extends AbstractSchema
{
    use Concerns\ParsesReferences;

    public function __construct(
        public readonly string $name,
        public readonly Description $description,

        /** @var array<string,Property> */
        public readonly array $properties,

        /** @var array<string,true> */
        public readonly array $required,
        public readonly ?string $discriminatorKey,

        /** @var ?array<string,string> */
        public readonly ?array $discriminatorMap,
        public readonly bool $nullable,
        public readonly string $type,

        /** @var ?list<class-string<Dto>> */
        public readonly ?array $unionTypes,
    ) {
    }

    /** @param TSchemaObject $schema */
    public static function make(string $name, object $schema): static
    {
        [$key, $map] = self::discriminator($schema->discriminator ?? null);

        $unionTypes = isset($schema->anyOf)
            ? array_map(fn ($type) => self::ref($type->{'$ref'})[0], $schema->anyOf)
            : null;

        return new self(
            name: $name,
            description: new Description($schema->description ?? null),
            required: $required = array_fill_keys($schema->required ?? [], true),
            properties: isset($schema->properties)
                ? self::makeProperties($schema->properties, $required)
                : [],
            discriminatorKey: $key,
            discriminatorMap: $map,
            type: $schema->type,
            unionTypes: $unionTypes,
            nullable: $schema->nullable ?? false,
        );
    }

    /**
     * @param  array<string,true>  $required
     * @return array<string,Property>
     */
    protected static function makeProperties(object $properties, array $required): array
    {
        $source = (array) $properties;

        $properties = array_map(
            function ($property, $name, $i) use ($required) {
                try {
                    return Property::make($name, $i, $required[$name] ?? false, $property);
                } catch (Throwable $e) {
                    throw new RuntimeException(sprintf(
                        'Failed to generate property [%s] (%s).',
                        $name,
                        json_encode($property),
                    ), previous: $e);
                }
            },
            $source,
            array_keys($source),
            range(0, count($source) - 1)
        );

        usort($properties, function (Property $a, Property $b) {
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

        return $properties;
    }

    /**
     * @param  ?object{mapping:object,propertyName:string}  $discriminator
     * @return array{0:?string,1:?array<string,string>}
     */
    protected static function discriminator(?object $discriminator): array
    {
        if (is_null($discriminator)) {
            return [null, null];
        }

        $key = $discriminator->propertyName;

        $map = (array) $discriminator->mapping;

        $map = array_map(fn ($ref) => static::ref($ref)[0], $map);

        return [$key, $map];
    }

    public function isPolymorphic(): bool
    {
        return ! is_null($this->discriminatorKey);
    }

    public function isUnionType(): bool
    {
        return ! is_null($this->unionTypes);
    }

    public function hasDateTime(): bool
    {
        foreach ($this->properties as $property) {
            if ($property->isDateTime()) {
                return true;
            }
        }

        return false;
    }

    public function hasMappedPropertyName(): bool
    {
        foreach ($this->properties as $property) {
            if ($property->requiresNameMapping()) {
                return true;
            }
        }

        return false;
    }
}
