<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Markdown\Link;
use Jira\CodeGen\Markdown\Table;
use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\Schema;
use Jira\CodeGen\Schema\Specification;
use Jira\CodeGen\Utils;

class DummySchemaReferencesReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        $references = [];
        $schemas = Specification::getComponentSchemas();

        foreach ($schemas as $name => $_schema) {
            if ($name === $schema->name) {
                continue;
            }

            $text = json_encode($_schema) ?: '';

            if (str_contains($text, '"#\/components\/schemas\/' . $schema->name . '"')) {
                $references[] = [$name];
            }
        }

        if (empty($references)) {
            return str_replace('DummySchemaReferences', '*None*', $stub);
        }

        $table = new Table(['Schema']);

        foreach ($references as $reference) {
            [$_schema] = $reference;

            $table->add([
                new Link($_schema, '/docs/schema/' . Utils::kebab($_schema) . '.md'),
            ]);
        }

        return str_replace('DummySchemaReferences', $table, $stub);
    }
}
