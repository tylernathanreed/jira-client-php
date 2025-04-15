<?php

namespace Reedware\OpenApi\Generators;

use Reedware\OpenApi\Replacers;
use Reedware\OpenApi\Schema\Schema;

/** @extends SourceGenerator<Schema> */
class SchemaSourceGenerator extends AbstractSourceGenerator
{
    /** {@inheritDoc} */
    protected $replacers = [
        Replacers\DummyClassReplacer::class,
        Replacers\Schema\Source\DummyClassDocReplacer::class,
        Replacers\Schema\Source\DummyIncludesReplacer::class,
        Replacers\Schema\Source\DummyParentReplacer::class,
        Replacers\Schema\Source\DummyPolymorphismReplacer::class,
        Replacers\Schema\Source\DummyPropertiesReplacer::class,
        Replacers\Schema\Source\DummyUnionReplacer::class,
        Replacers\Source\DummyNamespaceReplacer::class,
        Replacers\Source\SortImportsReplacer::class,
    ];
}
