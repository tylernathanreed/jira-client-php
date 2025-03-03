<?php

namespace Jira\CodeGen\Commands;

use Jira\CodeGen\Exceptions\ClassGenerationException;
use Jira\CodeGen\Generators\Generator;
use Jira\CodeGen\Schema\AbstractSchema;
use Override;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Throwable;

/**
 * @phpstan-template TSchema of AbstractSchema
 */
abstract class GeneratorCommand extends Command
{
    /** @return Generator<TSchema> */
    abstract public function generator(): Generator;

    #[Override]
    public function handle(): int
    {
        $generator = $this->generator();

        $names = $this->option('all')
            ? $generator->all()
            : [trim($this->argument('name'))]; // @phpstan-ignore argument.type (mixed)

        if (count($names) === 1 && empty($names[0])) {
            $this->error('Please provide a name or specify the --all option.');

            return 1;
        }

        $force = (bool) $this->option('force');

        $generated = [];

        foreach ($names as $name) {
            if (isset($generated[ucfirst($name)])) {
                continue;
            }

            try {
                $path = $generator->generate($name, $force);
            } catch (ClassGenerationException $e) {
                $this->error($e->getMessage());

                return 1;
            } catch (Throwable $e) {
                $this->error(sprintf(
                    'Failed to generate %s [%s]',
                    static::type(),
                    $name
                ));

                $this->error($e->getMessage());

                if ($e->getPrevious()) {
                    throw $e->getPrevious();
                }

                throw $e;
            }

            $generated[ucfirst($name)] = true;

            $this->success(sprintf(
                '%s [%s] created successfully.',
                static::type(),
                $path
            ));
        }

        return 0;
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
