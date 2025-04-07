<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Schema\AbstractSchema;
use Reedware\OpenApi\Schema\OperationGroup;
use Reedware\OpenApi\Schema\Schema;
use Reedware\OpenApi\Utils;

class DummyTitleReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if ($schema instanceof Schema) {
            return str_replace('DummyTitle', Utils::title($schema->name), $stub);
        }

        if ($schema instanceof OperationGroup) {
            return str_replace('DummyTitle', Utils::title($schema->name), $stub);
        }

        return $stub;
    }
}
