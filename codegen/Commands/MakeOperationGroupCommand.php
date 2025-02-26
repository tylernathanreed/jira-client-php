<?php

namespace Jira\CodeGen\Commands;

use Jira\CodeGen\Generators\Generator;
use Jira\CodeGen\Generators\OperationsGenerator;

class MakeOperationGroupCommand extends GeneratorCommand
{
    /** @var string */
    protected $name = 'make:operations';

    /** @var string */
    protected $description = 'Generates a new operations trait';

    public function handle(): ?bool
    {
        $result = parent::handle();

        if (! is_null($result)) {
            return $result;
        }

        $this->updatePerformsOperationsTrait();

        return null;
    }

    public function generator(): Generator
    {
        return $this->laravel->make(OperationsGenerator::class);
    }


    protected function updatePerformsOperationsTrait(): void
    {
        $filepath = realpath(__DIR__ . '/../../') . '/src/PerformsOperations.php';

        $stub = file_get_contents($filepath);

        if (! preg_match('/(?P<imports>(?:^ +use [^;{]+;$\n?)+)/m', $stub, $match)) {
            return;
        }

        $traits = array_map(
            fn($filepath) => '    use Operations\\' . basename($filepath, '.php') . ';',
            glob(realpath(__DIR__ . '/../../') . '/src/Operations/*.php')
        );

        $stub = str_replace(rtrim($match['imports']), implode("\n", $traits), $stub);

        file_put_contents($filepath, $stub);

        return;
    }
}
