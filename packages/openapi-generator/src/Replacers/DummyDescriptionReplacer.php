<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\Schema;

class DummyDescriptionReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        $content = $schema->description->toMarkdown();

        if (empty($content)) {
            return str_replace("\nDummyDescription", '', $stub);
        }

        return str_replace("\nDummyDescription", "\n" . $content, $stub);
    }
}
