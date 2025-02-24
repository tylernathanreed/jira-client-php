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

        return array_map(function ($value) {
            if ($value instanceof Dto) {
                return $value->toArray();
            }

            return $value;
        }, $properties);
    }

    /** @return array<string,mixed> */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
