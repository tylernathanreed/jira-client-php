<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Exceptions\MissingSpecificationException;
use Jira\CodeGen\Replacers\DummyMethodsReplacer;
use Jira\CodeGen\Replacers\DummyTraitReplacer;
use Jira\CodeGen\Schema\OperationGroup;
use Jira\CodeGen\Schema\Schema;
use Jira\CodeGen\Schema\Specification;

/** @extends Generator<Schema> */
class OperationsGenerator extends Generator
{
    /** {@inheritDoc} */
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
