<?php

namespace Jira\CodeGen\Contracts;

use Jira\CodeGen\Generators\ReadmeGenerator;
use Jira\CodeGen\Schema\AbstractSchema;

/**
 * @phpstan-template TSchema of AbstractSchema
 */
interface SupportsReadmeGenerator
{
    /** @return ReadmeGenerator<TSchema> */
    public function getReadmeGenerator(): ReadmeGenerator;
}
