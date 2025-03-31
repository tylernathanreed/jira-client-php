<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Markdown\Table;
use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\Schema;

class DummyPropertiesTableReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        $table = new Table(['Property', 'Type', 'Description']);

        foreach ($schema->properties as $property) {
            $table->add([
                "`{$property->name}`",
                "`{$property->type}`",
                $property->description,
            ]);
        }

        return str_replace('DummyPropertiesTable', $table, $stub);
    }
}
