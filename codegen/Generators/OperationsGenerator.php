<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Contracts\SupportsTestGenerator;
use Jira\CodeGen\Replacers\DummyMethodsReplacer;
use Jira\CodeGen\Replacers\DummyTraitReplacer;
use Jira\CodeGen\Schema\OperationGroup;
use Jira\CodeGen\Schema\Specification;

/**
 * @extends Generator<OperationGroup>
 * @implements SupportsTestGenerator<OperationGroup>
 */
class OperationsGenerator extends Generator implements SupportsTestGenerator
{
    /** {@inheritDoc} */
    protected $replacers = [
        DummyTraitReplacer::class,
        DummyMethodsReplacer::class,
    ];

    public function schema(string $name): OperationGroup
    {
        return Specification::getOperationGroup($name);
    }

    public function all(): array
    {
        return array_keys(Specification::getOperationGroups());
    }

    public function getTestGenerator(): TestGenerator
    {
        return new OperationsTestGenerator();
    }
}
