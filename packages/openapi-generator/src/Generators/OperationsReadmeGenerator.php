<?php

namespace Reedware\OpenApi\Generators;

use Reedware\OpenApi\Replacers\DummyOperationsListReplacer;
use Reedware\OpenApi\Replacers\DummyOperationsReplacer;
use Reedware\OpenApi\Replacers\DummySourceReplacer;
use Reedware\OpenApi\Replacers\DummyTitleReplacer;
use Reedware\OpenApi\Schema\OperationGroup;
use Reedware\OpenApi\Schema\Specification;
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
