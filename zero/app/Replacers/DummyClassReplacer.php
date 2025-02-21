<?php

namespace App\Replacers;

use App\Schema\AbstractSchema;
use App\Schema\Schema;

class DummyClassReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        return str_replace('DummyClass', $schema->name, $stub);
    }
}
