<?php

namespace Reedware\OpenApi\Generators;

use Reedware\OpenApi\Contracts\SupportsReadmeGenerator;
use Reedware\OpenApi\Contracts\SupportsTestGenerator;
use Reedware\OpenApi\Replacers\DummyMethodsReplacer;
use Reedware\OpenApi\Replacers\DummyTraitReplacer;
use Reedware\OpenApi\Schema\OperationGroup;
use Reedware\OpenApi\Schema\Specification;
use Override;

/**
 * @extends Generator<OperationGroup>
 * @implements SupportsTestGenerator<OperationGroup>
 * @implements SupportsReadmeGenerator<OperationGroup>
 */
class OperationsGenerator extends Generator implements SupportsTestGenerator, SupportsReadmeGenerator
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

    public function getReadmeGenerator(): ReadmeGenerator
    {
        return new OperationsReadmeGenerator();
    }

    #[Override]
    public function afterAll(): void
    {
        $this->updatePerformsOperationsTrait();
    }

    protected function updatePerformsOperationsTrait(): void
    {
        $filepath = realpath(__DIR__ . '/../../../..') . '/src/PerformsOperations.php';

        $stub = file_get_contents($filepath);

        if (! $stub) {
            return;
        }

        if (! preg_match('/(?P<imports>(?:^ +use [^;{]+;$\n?)+)/m', $stub, $match)) {
            return;
        }

        $traits = array_map(
            fn ($filepath) => '    use Operations\\' . basename($filepath, '.php') . ';',
            glob(realpath(__DIR__ . '/../../') . '/src/Operations/*.php') ?: []
        );

        $stub = str_replace(rtrim($match['imports']), implode("\n", $traits), $stub);

        file_put_contents($filepath, $stub);
    }
}
