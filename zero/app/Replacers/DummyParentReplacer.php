<?php

namespace App\Replacers;

use App\Schema\AbstractSchema;
use App\Schema\Schema;

class DummyParentReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        if ($schema instanceof Schema) {
            return str_replace('DummyParent', $schema->isPolymorphic() ? 'PolymorphicDto' : 'Dto', $stub);
        }

        return $stub;
    }
}
