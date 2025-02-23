<?php

namespace App\Generators;

use App\Exceptions\MissingSpecificationException;
use App\Replacers\DummyMethodsReplacer;
use App\Replacers\DummyTraitReplacer;
use App\Schema\OperationGroup;
use App\Schema\Schema;
use App\Schema\Specification;

/** @extends Generator<Schema> */
class OperationsGenerator extends Generator
{
    /** @inheritDoc */
    protected $replacers = [
        DummyTraitReplacer::class,
        DummyMethodsReplacer::class,
    ];

    protected function schema(string $name): OperationGroup
    {
        $operations = Specification::getOperationGroups();

        if (is_null($group = ($operations[$name] ?? null))) {
            throw new MissingSpecificationException($this->type(), $name);
        }

        return OperationGroup::make($name, $group);
    }

    public function all(): array
    {
        return array_keys(Specification::getOperationGroups());
    }
}
