<?php

namespace Jira\CodeGen\Replacers;

use Jira\CodeGen\Markdown\Link;
use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\Schema;

class DummySourceReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        $link = new Link(
            "`Jira\Client\Schema\\{$schema->name}`",
            "/src/Schema/{$schema->name}.php",
        );

        return str_replace('DummySource', $link, $stub);
    }
}
