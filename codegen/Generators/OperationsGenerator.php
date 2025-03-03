<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Contracts\SupportsTestGenerator;
use Jira\CodeGen\Exceptions\MissingSpecificationException;
use Jira\CodeGen\Generators\TestGenerator;
use Jira\CodeGen\Replacers\DummyMethodsReplacer;
use Jira\CodeGen\Replacers\DummyTraitReplacer;
use Jira\CodeGen\Schema\OperationGroup;
use Jira\CodeGen\Schema\Specification;

/** @extends Generator<OperationGroup> */
class OperationsGenerator extends Generator implements SupportsTestGenerator
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

    public function getTestGenerator(): TestGenerator
    {
        return new OperationsTestGenerator;
    }
}
