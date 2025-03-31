<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\OperationGroup;
use Jira\CodeGen\Schema\Schema;
use Jira\CodeGen\Utils;

class DummyTitleReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if ($schema instanceof Schema) {
            return str_replace('DummyTitle', Utils::title($schema->name), $stub);
        }

        if ($schema instanceof OperationGroup) {
            return str_replace('DummyTitle', Utils::title($schema->name), $stub);
        }

        return $stub;
    }
}
