<?php

namespace Reedware\OpenApi\Contracts;

use Reedware\OpenApi\Generators\ReadmeGenerator;
use Reedware\OpenApi\Schema\AbstractSchema;

/**
 * @phpstan-template TSchema of AbstractSchema
 */
interface SupportsReadmeGenerator
{
    /** @return ReadmeGenerator<TSchema> */
    public function getReadmeGenerator(): ReadmeGenerator;
}
