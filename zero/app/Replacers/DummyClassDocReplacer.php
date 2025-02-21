<?php

namespace App\Replacers;

use App\Schema\AbstractSchema;
use App\Schema\Schema;

class DummyClassDocReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        $content = $schema->description->render();

        if (empty($content)) {
            return str_replace("\n// DummyClassDoc", '', $stub);
        }

        return str_replace("\n// DummyClassDoc\n", "\n" . $content, $stub);
    }
}
