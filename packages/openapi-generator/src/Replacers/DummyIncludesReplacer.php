<?php

namespace Reedware\OpenApi\Replacers;

use DateTimeImmutable;
use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\Schema;

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

        foreach ($schema->getPropertyAttributes() as $attribute) {
            $includes[] = $attribute;
        }

        $content = implode("\n", array_map(fn ($v) => "use {$v};", $includes));

        if (! empty($content)) {
            $content .= "\n";
        }

        return str_replace("// DummyIncludes\n", $content, $stub);
    }
}
