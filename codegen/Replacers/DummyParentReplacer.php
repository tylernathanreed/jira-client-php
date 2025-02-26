<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\Schema;

class DummyParentReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if ($schema instanceof Schema) {
            if ($schema->isPolymorphic()) {
                return str_replace('DummyParent', 'PolymorphicDto', $stub);
            }

            if ($schema->isUnionType()) {
                return str_replace('DummyParent', 'UnionDto', $stub);
            }

            return str_replace('DummyParent', 'Dto', $stub);
        }

        return $stub;
    }
}
