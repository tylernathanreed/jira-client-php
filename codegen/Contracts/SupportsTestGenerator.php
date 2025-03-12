<?php

namespace Jira\CodeGen\Contracts;

use Jira\CodeGen\Generators\TestGenerator;
use Jira\CodeGen\Schema\AbstractSchema;

/**
 * @phpstan-template TSchema of AbstractSchema
 */
interface SupportsTestGenerator
{
    /** @return TestGenerator<TSchema> */
    public function getTestGenerator(): TestGenerator;
}
