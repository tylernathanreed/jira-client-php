<?php

namespace Jira\CodeGen\Commands;

use Jira\CodeGen\Exceptions\ClassGenerationException;
use Jira\CodeGen\Generators\Generator;
use Override;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

abstract class GeneratorCommand extends Command
{
    abstract public function generator(): Generator;

    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $generator = $this->generator();

        $names = $input->getOption('all')
            ? $generator->all()
            : [trim($input->getArgument('name'))];

        if (count($names) === 1 && empty($names[0])) {
            $output->writeln('ERROR: Please provide a name or specify the --all option.');

            return false;
        }

        $generated = [];

        foreach ($names as $name) {
            if (isset($generated[ucfirst($name)])) {
                continue;
            }

            try {
                $path = $generator->generate($name, $input->getOption('force'));

                $generated[ucfirst($name)] = true;
            } catch (ClassGenerationException $e) {
                $output->writeLn('ERROR: ' . $e->getMessage());

                return false;
            } catch (Throwable $e) {
                $output->writeLn(sprintf('ERROR: Failed to generate %s [%s]', static::type(), $name));
                $output->writeLn($e->getMessage());

                if ($e->getPrevious()) {
                    throw $e->getPrevious();
                }

                throw $e;
            }

            $output->writeLn(sprintf('%s [%s] created successfully.', static::type(), $path));
        }

        return 0;
    }

    protected function type(): string
    {
        return substr(class_basename(static::class), strlen('Make'), -strlen('Command'));
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
        $type = strtolower($this->type());

        return [
            ['name', InputArgument::OPTIONAL, "The name of the {$type}"],
        ];
    }

    /** @return list<array{0:string,1:string,2:int,3:string}> */
    protected function getOptions(): array
    {
        $type = strtolower($this->type());

        return [
            ['force', 'f', InputOption::VALUE_NONE, "Create the class even if the {$type} already exists"],
            ['all', 'A', InputOption::VALUE_NONE, "Create all discoverable {$type} classes"],
        ];
    }
}
