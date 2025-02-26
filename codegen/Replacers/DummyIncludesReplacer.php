<?php

namespace Jira\CodeGen\Replacers;

use DateTimeImmutable;
use Jira\Client\Attributes\MapName;
use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Schema\Schema;

class DummyIncludesReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! $schema instanceof Schema) {
            return $stub;
        }

        $includes = [];

        if ($schema->hasDateTime()) {
            $includes[] = DateTimeImmutable::class;
        }

        if ($schema->hasMappedPropertyName()) {
            $includes[] = MapName::class;
        }

        $content = implode("\n", array_map(fn($v) => "use {$v};", $includes));

        if (! empty($content)) {
            $content .= "\n";
        }

        return str_replace("// DummyIncludes\n", $content, $stub);
    }
}
