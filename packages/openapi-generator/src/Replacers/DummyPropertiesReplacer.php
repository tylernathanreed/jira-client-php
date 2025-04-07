<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\Schema;

class DummyPropertiesReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        $properties = array_map(fn ($property) => (string) $property, $schema->properties);

        $content = implode("\n\n", $properties);

        return str_replace('{{ DummyProperties }}', $content, $stub);
    }
}
