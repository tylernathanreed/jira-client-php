<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Configuration;
use Reedware\OpenApi\Schema\AbstractSchema;

abstract class Replacer
{
    public function __construct(
        protected Configuration $config,
    ) {
    }

    abstract public function replace(AbstractSchema $schema, string $stub): string;
}
