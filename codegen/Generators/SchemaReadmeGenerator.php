<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Replacers\DummyDescriptionReplacer;
use Jira\CodeGen\Replacers\DummyOperationReferencesReplacer;
use Jira\CodeGen\Replacers\DummyPropertiesTableReplacer;
use Jira\CodeGen\Replacers\DummySchemaReferencesReplacer;
use Jira\CodeGen\Replacers\DummySourceReplacer;
use Jira\CodeGen\Replacers\DummyTitleReplacer;
use Jira\CodeGen\Schema\Schema;
use Jira\CodeGen\Schema\Specification;
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
