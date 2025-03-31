<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Markdown\Link;
use Jira\CodeGen\Markdown\Table;
use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\Schema;
use Jira\CodeGen\Utils;

class DummyPropertiesTableReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        $table = new Table(['Property', 'Type', 'Description']);

        foreach ($schema->properties as $property) {
            $type = str_replace('|', '\|', $property->getDocType() ?: $property->type ?: 'mixed');

            if ($property->typeIsRef) {
                assert(is_string($property->type));

                $type = new Link("`{$type}`", '/docs/schema/' . Utils::kebab($property->type) . '.md');
            }

            if ($property->listableTypeIsRef) {
                assert(is_string($property->listableType));

                $type = new Link("`{$type}`", '/docs/schema/' . Utils::kebab($property->listableType) . '.md');
            }

            $table->add([
                "`{$property->name}`",
                $type instanceof Link ? $type : "`{$type}`",
                $property->description,
            ]);
        }

        return str_replace('DummyPropertiesTable', $table, $stub);
    }
}
