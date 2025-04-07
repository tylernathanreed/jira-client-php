<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Markdown\Link;
use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\OperationGroup;
use Reedware\OpenApi\Schema\Schema;

class DummySourceReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if ($schema instanceof Schema) {
            $link = new Link(
                "`Jira\Client\Schema\\{$schema->name}`",
                "/src/Schema/{$schema->name}.php",
            );

            return str_replace('DummySource', $link, $stub);
        }

        if ($schema instanceof OperationGroup) {
            $link = new Link(
                "`Jira\Client\Operations\\{$schema->name}`",
                "/src/Operations/{$schema->name}.php",
            );

            return str_replace('DummySource', $link, $stub);
        }

        return $stub;
    }
}
