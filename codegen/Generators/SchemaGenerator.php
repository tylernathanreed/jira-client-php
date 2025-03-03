<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Exceptions\MissingSpecificationException;
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

/**
 * @phpstan-import-type TSchema from Specification
 *
 * @extends Generator<Schema>
 */
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
    protected function schema(string $name): Schema
    {
        $spec = Specification::getSpecification();

        /** @var array<string,TSchema> */
        $schemas = $spec['components']['schemas'] ?? [];

        if (! isset($schemas[$name])) {
            throw new MissingSpecificationException($this->type(), $name);
        }

        return Schema::make(ucfirst($name), $schemas[$name]);
    }

    #[Override]
    public function all(): array
    {
        $spec = Specification::getSpecification();

        /** @var array<string,TSchema> */
        $schemas = $spec['components']['schemas'] ?? [];

        return array_keys($schemas);
    }
}
