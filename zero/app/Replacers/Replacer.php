<?php

namespace App\Replacers;

use App\Schema\AbstractSchema;

abstract class Replacer
{
    abstract public function replace(AbstractSchema $schema, string $stub): string;
}
