<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\Schema;

class DummyPropertiesTableReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        return str_replace('DummyPropertiesTable', $schema->getPropertiesMarkdown(), $stub);
    }
}
