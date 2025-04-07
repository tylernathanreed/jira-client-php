<?php

namespace Reedware\OpenApi\Generators;

use Reedware\OpenApi\Replacers\DummyClassReplacer;
use Reedware\OpenApi\Replacers\DummyTestMethodsReplacer;
use Reedware\OpenApi\Schema\OperationGroup;
use Reedware\OpenApi\Schema\Specification;
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
