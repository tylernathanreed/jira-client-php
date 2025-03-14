<?php

namespace Jira\CodeGen\Commands;

use Jira\CodeGen\Generators\Generator;
use Jira\CodeGen\Generators\OperationsGenerator;
use Jira\CodeGen\Schema\OperationGroup;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;

/** @extends GeneratorCommand<OperationGroup> */
#[AsCommand('make:operations', 'Generates a new operations trait')]
class MakeOperationGroupCommand extends GeneratorCommand
{
    #[Override]
    public function handle(): int
    {
        $result = parent::handle();

        if ($result) {
            return $result;
        }

        $this->updatePerformsOperationsTrait();

        return 0;
    }

    #[Override]
    public function generator(): Generator
    {
        return new OperationsGenerator();
    }

    protected function updatePerformsOperationsTrait(): void
    {
        $filepath = realpath(__DIR__ . '/../../') . '/src/PerformsOperations.php';

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
