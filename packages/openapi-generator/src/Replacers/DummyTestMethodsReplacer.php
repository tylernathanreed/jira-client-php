<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\OperationGroup;

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
