<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Markdown\Link;
use Reedware\OpenApi\Markdown\Table;
use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\Schema;
use Reedware\OpenApi\Schema\Specification;
use Reedware\OpenApi\Utils;

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
                new Link($_schema, '/docs/schema/' . Utils::slug($_schema) . '.md'),
            ]);
        }

        return str_replace('DummySchemaReferences', $table, $stub);
    }
}
