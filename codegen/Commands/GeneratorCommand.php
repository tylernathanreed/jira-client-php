<?php

namespace Jira\CodeGen\Commands;

use Jira\CodeGen\Contracts\SupportsTestGenerator;
use Jira\CodeGen\Exceptions\ClassGenerationException;
use Jira\CodeGen\Generators\Generator;
use Jira\CodeGen\Generators\TestGenerator;
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

            if (($path = $this->makeSourceFile($generator, $name, $force)) === false) {
                return 1;
            }

            if ($generator instanceof SupportsTestGenerator) {
                if ($this->makeTestFile($generator->getTestGenerator(), $name, $force) === false) {
                    return 1;
                }
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

    /** @param Generator<TSchema> $generator */
    protected function makeSourceFile(Generator $generator, string $name, bool $force): string|false
    {
        try {
            return $generator->generate($name, $force);
        } catch (ClassGenerationException $e) {
            $this->error($e->getMessage());

            return false;
        } catch (Throwable $e) {
            $this->error(sprintf(
                'Failed to generate %s [%s].',
                static::type(),
                $name
            ));

            $this->error($e->getMessage());

            if ($e->getPrevious()) {
                throw $e->getPrevious();
            }

            throw $e;
        }
    }

    /** @param TestGenerator<AbstractSchema> $generator */
    protected function makeTestFile(TestGenerator $generator, string $name, bool $force): string|false
    {
        try {
            return $generator->generate($name, $force);
        } catch (Throwable $e) {
            $this->error(sprintf(
                'Failed to generate test for %s [%s].',
                static::type(),
                $name
            ));

            $this->error($e->getMessage());

            if ($e->getPrevious()) {
                throw $e->getPrevious();
            }

            throw $e;
        }
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
