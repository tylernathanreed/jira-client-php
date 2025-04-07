<?php

namespace Reedware\OpenApi\Contracts;

use Reedware\OpenApi\Generators\TestGenerator;
use Reedware\OpenApi\Schema\AbstractSchema;

/**
 * @phpstan-template TSchema of AbstractSchema
 */
interface SupportsTestGenerator
{
    /** @return TestGenerator<TSchema> */
    public function getTestGenerator(): TestGenerator;
}
