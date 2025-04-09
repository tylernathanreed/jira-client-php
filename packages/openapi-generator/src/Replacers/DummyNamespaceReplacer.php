<?php

namespace Reedware\OpenApi\Replacers;

use Reedware\OpenApi\Schema\AbstractSchema;

class DummyNamespaceReplacer extends Replacer
{
    public function replace(AbstractSchema $schema, string $stub): string
    {
        return str_replace('DummyNamespace', $this->config->namespace, $stub);
    }
}
