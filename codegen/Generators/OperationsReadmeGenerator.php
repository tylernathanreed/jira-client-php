<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Replacers\DummyOperationsListReplacer;
use Jira\CodeGen\Replacers\DummyOperationsReplacer;
use Jira\CodeGen\Replacers\DummySourceReplacer;
use Jira\CodeGen\Replacers\DummyTitleReplacer;
use Jira\CodeGen\Schema\OperationGroup;
use Jira\CodeGen\Schema\Specification;
use Override;

/** @extends ReadmeGenerator<OperationGroup> */
class OperationsReadmeGenerator extends ReadmeGenerator
{
    /** {@inheritDoc} */
    protected $replacers = [
        DummyTitleReplacer::class,
        DummySourceReplacer::class,
        DummyOperationsListReplacer::class,
        DummyOperationsReplacer::class,
    ];

    #[Override]
    public function schema(string $name): OperationGroup
    {
        return Specification::getOperationGroup($name);
    }
}
