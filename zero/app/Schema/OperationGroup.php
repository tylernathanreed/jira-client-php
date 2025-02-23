<?php

namespace App\Schema;

/**
 * @phpstan-import-type TOperationArray from Specification
 */
final class OperationGroup extends AbstractSchema
{
    public function __construct(
        public readonly string $name,

        /** @var array<string,Operation> */
        public readonly array $operations,
    ) {
    }

    /** @param array<string,TOperationArray> $operations */
    public static function make(string $name, array $operations): static
    {
        return new static(
            name: $name,
            operations: array_map(fn ($o) => Operation::make($o), $operations),
        );
    }
}
