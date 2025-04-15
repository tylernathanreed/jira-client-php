<?php

namespace Reedware\OpenApi\Replacers\Source;

use Reedware\OpenApi\Replacers\AbstractReplacer;

class SortImportsReplacer extends AbstractReplacer
{
    public function replace(string $stub): string
    {
        if (! preg_match('/(?P<imports>(?:^use [^;{]+;$\n?)+)/m', $stub, $match)) {
            return $stub;
        }

        $imports = explode("\n", trim($match['imports']));

        sort($imports);

        return str_replace(trim($match['imports']), implode("\n", $imports), $stub);
    }
}
