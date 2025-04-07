<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Schema\AbstractSchema;

abstract class Replacer
{
    abstract public function replace(AbstractSchema $schema, string $stub): string;
}
