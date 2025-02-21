<?php

namespace App\Replacers;

use App\Schema\AbstractSchema;
use App\Schema\Schema;

class DummyUnionReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        if (! $schema->isUnionType()) {
            return str_replace("\n    // DummyUnion", '', $stub);
        }

        $types = '';
        $indent = str_repeat(' ', 12);

        foreach ($schema->unionTypes as $type) {
            $types .= "{$indent}{$type}::class,\n";
        }

        $types = rtrim($types, "\n");

        $stub = str_replace("    // DummyUnion\n", <<<DOC

            /** @inheritDoc */
            public function unionTypes(): array
            {
                return [
        {$types}
                ];
            }

        DOC, $stub);

        return str_replace(<<<DOC

            public function __construct(

            ) {
            }

        DOC, '', $stub);
    }
}
