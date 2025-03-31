<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Markdown\Link;
use Jira\CodeGen\Markdown\Table;
use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\Schema;
use Jira\CodeGen\Schema\Specification;
use Jira\CodeGen\Utils;

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

            $base = '/docs/operations/' . Utils::kebab($group) . '.md';

            $table->add([
                new Link($group, $base),
                new Link($operation, $base . '#' . Utils::kebab($operation)),
            ]);
        }

        return str_replace('DummyOperationReferences', $table, $stub);
    }
}
