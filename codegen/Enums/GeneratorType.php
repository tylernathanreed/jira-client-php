<?php

namespace Jira\CodeGen\Enums;

use Jira\CodeGen\Contracts\SupportsTestGenerator;
use Jira\CodeGen\Generators\Generator;
use Jira\CodeGen\Generators\OperationsGenerator;
use Jira\CodeGen\Generators\SchemaGenerator;

enum GeneratorType: string
{
    case Schema = 'schema';
    case Operations = 'operations';

    /** @return list<string> */
    public static function values(): array
    {
        return array_map(fn (GeneratorType $enum) => $enum->value, static::cases());
    }

    /** @return class-string<Generator<*>> */
    public function generator(): string
    {
        return match ($this) {
            self::Schema => SchemaGenerator::class,
            self::Operations => OperationsGenerator::class,
        };
    }

    public function supportsTestGenerator(): bool
    {
        return is_subclass_of($this->generator(), SupportsTestGenerator::class);
    }
}
