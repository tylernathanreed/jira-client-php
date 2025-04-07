<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\OperationGroup;
use Reedware\OpenApi\Schema\Schema;

class DummyClassReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if ($schema instanceof Schema) {
            return str_replace('DummyClass', $schema->name, $stub);
        }

        if ($schema instanceof OperationGroup) {
            return str_replace('DummyClass', $schema->name, $stub);
        }

        return $stub;
    }
}
