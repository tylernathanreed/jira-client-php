<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\OperationGroup;

class DummyTestMethodsReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof OperationGroup) {
            return $stub;
        }

        $methods = array_map(fn ($operation) => $operation->getTestDefinition(), $schema->operations);

        $content = implode("\n\n", $methods);

        return str_replace('    // DummyTestMethods', $content, $stub);
    }
}
