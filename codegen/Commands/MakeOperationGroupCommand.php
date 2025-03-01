<?php

namespace Jira\CodeGen\Commands;

use Jira\CodeGen\Generators\Generator;
use Jira\CodeGen\Generators\OperationsGenerator;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('make:operations', 'Generates a new operations trait')]
class MakeOperationGroupCommand extends GeneratorCommand
{
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $result = parent::execute($input, $output);

        if ($result) {
            return $result;
        }

        $this->updatePerformsOperationsTrait();

        return 0;
    }

    public function generator(): Generator
    {
        return new OperationsGenerator();
    }

    protected function updatePerformsOperationsTrait(): void
    {
        $filepath = realpath(__DIR__ . '/../../') . '/src/PerformsOperations.php';

        $stub = file_get_contents($filepath);

        if (! preg_match('/(?P<imports>(?:^ +use [^;{]+;$\n?)+)/m', $stub, $match)) {
            return;
        }

        $traits = array_map(
            fn ($filepath) => '    use Operations\\' . basename($filepath, '.php') . ';',
            glob(realpath(__DIR__ . '/../../') . '/src/Operations/*.php')
        );

        $stub = str_replace(rtrim($match['imports']), implode("\n", $traits), $stub);

        file_put_contents($filepath, $stub);

    }
}
