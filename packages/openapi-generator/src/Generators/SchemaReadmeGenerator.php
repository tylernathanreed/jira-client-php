<?php

namespace Reedware\OpenApi\Generators;

use Reedware\OpenApi\Replacers\DummyDescriptionReplacer;
use Reedware\OpenApi\Replacers\DummyOperationReferencesReplacer;
use Reedware\OpenApi\Replacers\DummyPropertiesTableReplacer;
use Reedware\OpenApi\Replacers\DummySchemaReferencesReplacer;
use Reedware\OpenApi\Replacers\DummySourceReplacer;
use Reedware\OpenApi\Replacers\DummyTitleReplacer;
use Reedware\OpenApi\Schema\Schema;
use Reedware\OpenApi\Schema\Specification;
use Override;

/** @extends ReadmeGenerator<Schema> */
class SchemaReadmeGenerator extends ReadmeGenerator
{
    /** {@inheritDoc} */
    protected $replacers = [
        DummyTitleReplacer::class,
        DummyDescriptionReplacer::class,
        DummySourceReplacer::class,
        DummyPropertiesTableReplacer::class,
        DummyOperationReferencesReplacer::class,
        DummySchemaReferencesReplacer::class,
    ];

    #[Override]
    public function schema(string $name): Schema
    {
        return Specification::getComponentSchema($name);
    }
}
