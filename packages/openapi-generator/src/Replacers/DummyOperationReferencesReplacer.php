<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Markdown\Link;
use Reedware\OpenApi\Markdown\Table;
use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\Schema;
use Reedware\OpenApi\Schema\Specification;
use Reedware\OpenApi\Utils;

class DummyOperationReferencesReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        $references = [];
        $groups = Specification::getOperationGroups();

        foreach ($groups as $group => $operations) {
            foreach ($operations as $operation => $definition) {
                $text = json_encode($definition['operation']) ?: '';

                if (str_contains($text, '"#\/components\/schemas\/' . $schema->name . '"')) {
                    $references[] = [$group, $operation];
                }
            }
        }

        if (empty($references)) {
            return str_replace('DummyOperationReferences', '*None*', $stub);
        }

        $table = new Table(['Group', 'Operation']);

        foreach ($references as $reference) {
            [$group, $operation] = $reference;

            $base = '/docs/operations/' . Utils::slug($group) . '.md';

            $table->add([
                new Link($group, $base),
                new Link($operation, $base . '#' . Utils::slug($operation)),
            ]);
        }

        return str_replace('DummyOperationReferences', $table, $stub);
    }
}
