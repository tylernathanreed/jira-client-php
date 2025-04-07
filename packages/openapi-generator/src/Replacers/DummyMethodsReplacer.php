<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\OperationGroup;

class DummyMethodsReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof OperationGroup) {
            return $stub;
        }

        $methods = array_map(fn ($operation) => (string) $operation, $schema->operations);

        $content = implode("\n\n", $methods);

        return str_replace('    // DummyMethods', $content, $stub);
    }
}
