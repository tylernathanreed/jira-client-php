<?php

namespace Reedware\OpenApi\Generators;

use Reedware\OpenApi\Contracts\SupportsReadmeGenerator;
use Reedware\OpenApi\Replacers\DummyClassDocReplacer;
use Reedware\OpenApi\Replacers\DummyClassReplacer;
use Reedware\OpenApi\Replacers\DummyIncludesReplacer;
use Reedware\OpenApi\Replacers\DummyParentReplacer;
use Reedware\OpenApi\Replacers\DummyPolymorphismReplacer;
use Reedware\OpenApi\Replacers\DummyPropertiesReplacer;
use Reedware\OpenApi\Replacers\DummyUnionReplacer;
use Reedware\OpenApi\Schema\Schema;
use Reedware\OpenApi\Schema\Specification;
use Override;

/**
 * @extends Generator<Schema>
 * @implements SupportsReadmeGenerator<Schema>
 */
class SchemaGenerator extends Generator implements SupportsReadmeGenerator
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

    public function getReadmeGenerator(): ReadmeGenerator
    {
        return new SchemaReadmeGenerator();
    }
}
