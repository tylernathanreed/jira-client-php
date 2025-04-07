<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\Schema;

class DummyPropertiesTableReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        return str_replace('DummyPropertiesTable', $schema->getPropertiesMarkdown(), $stub);
    }
}
