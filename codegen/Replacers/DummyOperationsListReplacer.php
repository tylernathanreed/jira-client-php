<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Markdown\Link;
use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\OperationGroup;

class DummyOperationsListReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof OperationGroup) {
            return $stub;
        }

        $list = '';

        foreach ($schema->operations as $operation) {
            $list .= '- ' . new Link($operation->summary, '#' . $operation->id) . "\n";
        }

        $list = rtrim($list);

        return str_replace('DummyOperationsList', $list, $stub);
    }
}
