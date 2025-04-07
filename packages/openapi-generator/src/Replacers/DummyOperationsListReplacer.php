<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Markdown\Link;
use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\OperationGroup;

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
