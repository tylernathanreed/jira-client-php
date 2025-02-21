<?php

namespace App\Generators;

use App\Exceptions\MissingSpecificationException;
use App\Replacers\DummyClassDocReplacer;
use App\Replacers\DummyClassReplacer;
use App\Replacers\DummyIncludesReplacer;
use App\Replacers\DummyParentReplacer;
use App\Replacers\DummyPolymorphismReplacer;
use App\Replacers\DummyPropertiesReplacer;
use App\Replacers\DummyUnionReplacer;
use App\Schema\Schema;
use App\Schema\Specification;

/** @extends Generator<Schema> */
class SchemaGenerator extends Generator
{
    /** @inheritDoc */
    protected $replacers = [
        DummyClassReplacer::class,
        DummyParentReplacer::class,
        DummyClassDocReplacer::class,
        DummyPropertiesReplacer::class,
        DummyPolymorphismReplacer::class,
        DummyUnionReplacer::class,
        DummyIncludesReplacer::class,
    ];

    protected function schema(string $name): Schema
    {
        $spec = Specification::getSpecification();

        $schemas = $spec->components->schemas;

        if (! isset($schemas->{$name})) {
            throw new MissingSpecificationException($this->type(), $name);
        }

        return Schema::make(ucfirst($name), $schemas->{$name});
    }

    public function all(): array
    {
        $spec = Specification::getSpecification();

        $schemas = $spec->components->schemas;

        return array_keys((array) $schemas);
    }
}
