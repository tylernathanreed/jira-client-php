<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Schema\AbstractSchema;

abstract class Replacer
{
    abstract public function replace(AbstractSchema $schema, string $stub): string;
}
