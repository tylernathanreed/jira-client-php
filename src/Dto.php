<?php

namespace Jira\Client;

use JsonSerializable;
use ReflectionClass;
use ReflectionProperty;

abstract readonly class Dto implements JsonSerializable
{
    /** @return array<string,mixed> */
    public function toArray(): array
    {
        $properties = [];

        foreach ((new ReflectionClass($this))->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            $properties[$property->getName()] = $property->getValue($this);
        }

        return static::arrayify($properties);
    }

    /** @return array<string,mixed> */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @phpstan-template TKey of int|string
     * @phpstan-template TValue of mixed
     * @phpstan-template TScalar of string|int|float|bool|null
     *
     * @param Dto|array<TKey,TValue>|TScalar $value
     * @return ($value is Dto ? array<string,mixed> : ($value is array ? array<TKey,TValue> : TScalar))
     */
    protected static function arrayify(Dto|array|string|int|float|bool|null $value): array|string|int|float|bool|null
    {
        if ($value instanceof Dto) {
            return static::arrayify($value->toArray());
        }

        if (is_array($value)) {
            // @phpstan-ignore argument.type
            return array_map(function (Dto|array|string|int|float|bool|null $v): array|string|int|float|bool|null {
                // @phpstan-ignore argument.templateType
                return static::arrayify($v);
            }, $value);
        }

        return $value;
    }
}
