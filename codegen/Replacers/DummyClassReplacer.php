<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\OperationGroup;
use Jira\CodeGen\Schema\Schema;

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
