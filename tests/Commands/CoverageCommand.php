<?php

namespace Tests\Commands;

use Exception;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tests\Coverage;

#[AsCommand('coverage', 'Displays the coverage report.')]
class CoverageCommand extends Command
{
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $coverage = Coverage::report($output, (bool) $input->getOption('compact'));
        } catch (Exception $e) {
            $output->writeln(
                '  <fg=black;bg=yellow;options=bold> WARN </> ' . $e->getMessage() . '</>',
            );
        }

        if ($coverage < 100.0) {
            $output->writeln(sprintf(
                '  %s Code coverage below expected: %s. Minimum: %s.</>',
                '<fg=black;bg=red;options=bold> FAIL </>',
                '<fg=red;options=bold>' . number_format($coverage, 1) . '%</>',
                '<fg=white;options=bold>100.0%</>',
            ));

            return 1;
        }

        return 0;
    }

    #[Override]
    protected function configure(): void
    {
        $this->setHidden(true);

        foreach ($this->getOptions() as $options) {
            $this->addOption(...$options);
        }
    }

    /** @return list<array{0:string,1:string,2:int,3:string}> */
    protected function getOptions(): array
    {
        return [
            ['compact', 'c', InputOption::VALUE_NONE, 'Replace default result output with Compact format'],
        ];
    }
}
