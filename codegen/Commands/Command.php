<?php

namespace Jira\CodeGen\Commands;

use LogicException;
use Override;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{
    protected InputInterface $input;
    protected OutputInterface $output;

    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->input = $input;
        $this->output = $output;

        return $this->handle();
    }

    public function handle(): int
    {
        throw new LogicException('You must override the handle() method in the concrete command class.');
    }

    protected function option(string $name): mixed
    {
        return $this->input->getOption($name);
    }

    protected function argument(string $name): mixed
    {
        return $this->input->getArgument($name);
    }

    protected function info(string $message): void
    {
        $this->output->writeln('  <bg=blue;fg=white;options=bold> INFO </> ' . $message);
    }

    protected function success(string $message): void
    {
        $this->output->writeln('  <bg=green;fg=white;options=bold> SUCCESS </> ' . $message);
    }

    protected function warn(string $message): void
    {
        $this->output->writeln('  <bg=yellow;fg=white;options=bold> WARN </> ' . $message);
    }

    protected function error(string $message): void
    {
        $this->output->writeln('  <bg=red;fg=white;options=bold> ERROR </> ' . $message);
    }

    #[Override]
    public function configure(): void
    {
        foreach ($this->getArguments() as $arguments) {
            $this->addArgument(...$arguments);
        }

        foreach ($this->getOptions() as $options) {
            $this->addOption(...$options);
        }
    }


    /** @return list<array{0:string,1:int,2:string}> */
    protected function getArguments(): array
    {
        return [];
    }


    /** @return list<array{0:string,1:string,2:int,3:string}> */
    protected function getOptions(): array
    {
        return [];
    }
}
