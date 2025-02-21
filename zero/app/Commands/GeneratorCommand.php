<?php

namespace App\Commands;

use App\Exceptions\ClassAlreadyExistsException;
use App\Exceptions\ClassGenerationException;
use App\Generators\Generator;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Throwable;

abstract class GeneratorCommand extends Command
{
    abstract public function generator(): Generator;

    public function handle(): ?bool
    {
        $generator = $this->generator();

        $names = $this->option('all')
            ? $generator->all()
            : [trim($this->argument('name'))];

        if (count($names) === 1 && empty($names[0])) {
            $this->components->error('Please provide a name or specify the --all option.');

            return false;
        }

        $generated = [];

        foreach ($names as $name) {
            if (isset($generated[ucfirst($name)])) {
                continue;
            }

            try {
                $path = $generator->generate($name, $this->option('force'));

                $generated[ucfirst($name)] = true;
            } catch (ClassGenerationException $e) {
                $this->components->error($e->getMessage());

                return false;
            } catch (Throwable $e) {
                $this->components->error(sprintf('Failed to generate %s [%s]', static::type(), $name));
                $this->components->error($e->getMessage());

                if ($e->getPrevious()) {
                    throw $e->getPrevious();
                }

                throw $e;
            }

            $this->components->info(sprintf('%s [%s] created successfully.', static::type(), $path));
        }

        return null;
    }

    protected function type(): string
    {
        return substr(class_basename(static::class), strlen('Make'), -strlen('Command'));
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
