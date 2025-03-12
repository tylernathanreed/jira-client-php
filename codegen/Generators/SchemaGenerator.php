<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Replacers\DummyClassDocReplacer;
use Jira\CodeGen\Replacers\DummyClassReplacer;
use Jira\CodeGen\Replacers\DummyIncludesReplacer;
use Jira\CodeGen\Replacers\DummyParentReplacer;
use Jira\CodeGen\Replacers\DummyPolymorphismReplacer;
use Jira\CodeGen\Replacers\DummyPropertiesReplacer;
use Jira\CodeGen\Replacers\DummyUnionReplacer;
use Jira\CodeGen\Schema\Schema;
use Jira\CodeGen\Schema\Specification;
use Override;

/** @extends Generator<Schema> */
class SchemaGenerator extends Generator
{
    /** {@inheritDoc} */
    protected $replacers = [
        DummyClassDocReplacer::class,
        DummyClassReplacer::class,
        DummyParentReplacer::class,
        DummyPropertiesReplacer::class,
        DummyPolymorphismReplacer::class,
        DummyUnionReplacer::class,
        DummyIncludesReplacer::class,
    ];

    #[Override]
    public function schema(string $name): Schema
    {
        return Specification::getComponentSchema($name);
    }

    #[Override]
    public function all(): array
    {
        return array_keys(Specification::getComponentSchemas());
    }
}
