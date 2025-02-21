<?php

namespace App\Replacers;

use App\Schema\AbstractSchema;

class SortImportsReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if (! preg_match('/(?P<imports>(?:^use [^;{]+;$\n?)+)/m', $stub, $match)) {
            return $stub;
        }

        $imports = explode("\n", trim($match['imports']));

        sort($imports);

        return str_replace(trim($match['imports']), implode("\n", $imports), $stub);
    }
}
