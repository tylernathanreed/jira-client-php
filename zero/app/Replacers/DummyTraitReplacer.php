<?php

namespace App\Replacers;

use App\Schema\AbstractSchema;
use App\Schema\OperationGroup;

class DummyTraitReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof OperationGroup) {
            return $stub;
        }

        return str_replace('DummyTrait', $schema->name, $stub);
    }
}
