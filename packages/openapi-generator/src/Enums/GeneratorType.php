<?php

namespace Reedware\OpenApi\Enums;

use Reedware\OpenApi\Contracts\SupportsReadmeGenerator;
use Reedware\OpenApi\Contracts\SupportsTestGenerator;
use Reedware\OpenApi\Generators\Generator;
use Reedware\OpenApi\Generators\OperationsGenerator;
use Reedware\OpenApi\Generators\SchemaGenerator;

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

    public function supportsReadmeGenerator(): bool
    {
        return is_subclass_of($this->generator(), SupportsReadmeGenerator::class);
    }

    public function supportsTestGenerator(): bool
    {
        return is_subclass_of($this->generator(), SupportsTestGenerator::class);
    }
}
