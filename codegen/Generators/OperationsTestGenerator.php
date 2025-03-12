<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Replacers\DummyClassReplacer;
use Jira\CodeGen\Replacers\DummyTestMethodsReplacer;
use Jira\CodeGen\Schema\OperationGroup;
use Jira\CodeGen\Schema\Specification;
use Override;

/**
 * @phpstan-import-type TSchema from Specification
 *
 * @extends TestGenerator<OperationGroup>
 */
class OperationsTestGenerator extends TestGenerator
{
    /** {@inheritDoc} */
    protected $replacers = [
        DummyClassReplacer::class,
        DummyTestMethodsReplacer::class,
    ];

    #[Override]
    public function schema(string $name): OperationGroup
    {
        return Specification::getOperationGroup($name);
    }
}
