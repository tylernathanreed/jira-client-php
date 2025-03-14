<?php

namespace Jira\Client;

use DateTimeImmutable;
use InvalidArgumentException;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionProperty;

class Deserializer
{
    /**
     * @phpstan-template TDto of Dto
     * @param ($array is true ? list<array<string,mixed>> : array<string,mixed>) $data
     * @param class-string<TDto> $class
     * @return ($array is true ? (TDto is PolymorphicDto ? list<Dto> : list<TDto>) : (TDto is PolymorphicDto ? Dto : TDto))
     */
    public function deserialize(array $data, string $class, bool $array = false)
    {
        if ($array) {
            $values = [];

            foreach ($data as $value) {
                $values[] = self::deserialize($value, $class);
            }

            return $values;
        }

        if (is_subclass_of($class, PolymorphicDto::class)) {
            $class = $class::discriminateFromData($data);
        }

        return $this->from($class, $data);
    }

    /**
     * @phpstan-template T of Dto
     * @param class-string<T> $class
     * @param array<string,mixed> $data
     * @return T
     */
    public function from(string $class, array $data): Dto
    {
        $reflector = new ReflectionClass($class);

        $parameters = $reflector->getConstructor()?->getParameters() ?? [];

        $args = [];

        foreach ($parameters as $parameter) {
            $name = $parameter->getName();
            $key = str_starts_with($name, '_')
                ? substr($name, 1)
                : $name;

            $property = $reflector->getProperty($name);

            $value = array_key_exists($key, $data)
                ? $data[$key]
                : (
                    $parameter->isDefaultValueAvailable()
                    ? $parameter->getDefaultValue()
                    : null
                );

            $type = $parameter->getType();

            if (is_null($value)) {
                $args[] = $value;
            } elseif (is_null($type)) {
                $args[] = $value;
            } elseif (! $type instanceof ReflectionNamedType) {
                $args[] = $value;
            } elseif ($type->getName() === 'array' && is_array($value)) {
                $args[] = $this->fromArray($property, $value);
            } elseif ($type->getName() === DateTimeImmutable::class && is_string($value)) {
                $args[] = new DateTimeImmutable($value);
            } elseif ($type->getName() === DateTimeImmutable::class && is_int($value)) {
                $args[] = (new DateTimeImmutable)->setTimestamp($value);
            } elseif (! $type->isBuiltin() && is_subclass_of($type->getName(), Dto::class) && is_array($value)) {
                // @phpstan-ignore argument.type
                $args[] = $this->from($type->getName(), $value);
            } else {
                $args[] = $value;
            }
        }

        return $reflector->newInstanceArgs($args);
    }

    /**
     * @param array<mixed,mixed> $array
     * @return array<mixed,mixed>
     */
    protected function fromArray(ReflectionProperty $property, array $array): array
    {
        $doc = $property->getDocComment();

        if (! $doc || ! preg_match('/list<(?<list>[^>]+)>|array<(?<key>[^>]+), ?(?<type>[^>]+)/', $doc, $matches)) {
            return $array;
        }

        $type = $matches['type'] ?? $matches['list'];

        if ($type === 'mixed') {
            return $array;
        }

        if (in_array($type, ['int', 'float', 'string'])) {
            return array_map(function ($v) use ($type) {
                settype($v, $type);
                return $v;
            }, $array);
        }

        if (class_exists($subclass = 'Jira\\Client\\Schema\\' . $type) && is_subclass_of($subclass, Dto::class)) {
            // @phpstan-ignore argument.type
            return $this->deserialize($array, $subclass, array: true);
        }

        throw new InvalidArgumentException("Unknown class [{$subclass}].");
    }
}
