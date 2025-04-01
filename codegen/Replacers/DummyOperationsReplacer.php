<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\OperationGroup;

class DummyOperationsReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof OperationGroup) {
            return $stub;
        }

        $contents = '';

        foreach ($schema->operations as $operation) {
            $contents .= $operation->toMarkdown() . "\n";
        }

        $contents = rtrim($contents);

        return str_replace('DummyOperations', $contents, $stub);
    }
}
