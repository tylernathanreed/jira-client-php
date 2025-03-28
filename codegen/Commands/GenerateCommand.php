<?php

namespace Jira\CodeGen\Commands;

use Jira\CodeGen\Contracts\SupportsTestGenerator;
use Jira\CodeGen\Enums\GeneratorType;
use Jira\CodeGen\Exceptions\ClassGenerationException;
use Jira\CodeGen\Exceptions\CommandFailedException;
use Jira\CodeGen\Generators\AbstractSchemaGenerator;
use Jira\CodeGen\Generators\Generator;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Throwable;
use ValueError;

#[AsCommand('generate', 'Generates source files from the OpenAPI Specification')]
class GenerateCommand extends Command
{
    /** @var array<string,Generator<*>> */
    protected array $generators = [];

    #[Override]
    public function handle(): int
    {
        [$type, $name] = $this->validated();

        $this->generate($type, $name);

        return 0;
    }

    /** @return array{0:?GeneratorType,1:?string} */
    protected function validated(): array
    {
        return [
            $type = $this->validatedType(),
            $this->validatedName($type),
        ];
    }

    protected function validatedType(): ?GeneratorType
    {
        /** @var ?string $type */
        $type = $this->argument('type');

        if (is_null($type)) {
            return null;
        }

        try {
            return GeneratorType::from($type);
        } catch (ValueError $e) {
            throw new CommandFailedException(sprintf(
                'Invalid type "%s". Must be one of: "%s"',
                $type,
                implode(", ", GeneratorType::values())
            ), previous: $e);
        }
    }

    protected function validatedName(?GeneratorType $type): ?string
    {
        if (is_null($type)) {
            return null;
        }

        /** @var ?string $name */
        $name = $this->argument('name');

        if (is_null($name)) {
            return null;
        }

        $names = $this->names($type);

        if (! in_array($name, $names)) {
            throw new CommandFailedException(sprintf(
                'Invalid name "%s". Must be one of: "%s"',
                $name,
                implode(", ", $names)
            ));
        }

        return $name;
    }

    protected function generate(?GeneratorType $type, ?string $name): void
    {
        if (! is_null($type) && ! is_null($name)) {
            $this->generateAssets($type, $name);
        } elseif (! is_null($type)) {
            $this->generateType($type);
        } else {
            $this->generateAll();
        }
    }

    protected function generateAssets(GeneratorType $type, string $name): void
    {
        $path = $this->generateSourceFile($type, $name);

        if ($type->supportsTestGenerator()) {
            $this->generateTestFile($type, $name);
        }

        $this->success(sprintf(
            '%s [%s] created successfully.',
            $type->name,
            $path
        ));
    }

    protected function generateSourceFile(GeneratorType $type, string $name): string
    {
        $generator = $this->generator($type);

        return $this->runGenerator($generator, $type, 'source', $name);
    }

    protected function generateTestFile(GeneratorType $type, string $name): string
    {
        /** @var Generator<*>&SupportsTestGenerator<*> */
        $sourceGenerator = $this->generator($type);

        $testGenerator = $sourceGenerator->getTestGenerator();

        return $this->runGenerator($testGenerator, $type, 'test', $name);
    }

    protected function generateType(GeneratorType $type): void
    {
        $generator = $this->generator($type);

        $generated = [];

        $missing = array_fill_keys($generator->existing(), true);

        foreach ($this->names($type) as $name) {
            if (isset($generated[ucfirst($name)])) {
                continue;
            }

            $this->generateAssets($type, $name);

            $generated[$name] = true;
            unset($missing[$name]);
        }

        $missing = array_keys($missing);

        foreach ($missing as $name) {
            $this->warn(sprintf(
                '%s [%s] is missing!',
                $type->name,
                $name
            ));
        }

        $generator->afterAll();
    }

    protected function generateAll(): void
    {
        foreach (GeneratorType::cases() as $type) {
            $this->generateType($type);
        }
    }

    /** @param AbstractSchemaGenerator<*> $generator */
    protected function runGenerator(AbstractSchemaGenerator $generator, GeneratorType $type, string $asset, string $name): string
    {
        try {
            return $generator->generate($name, force: true);
        } catch (ClassGenerationException $e) {
            throw new CommandFailedException($e->getMessage(), previous: $e);
        } catch (Throwable $e) {
            $this->error(sprintf(
                'Failed to generate %s %s [%s].',
                $asset,
                $type->name,
                $name
            ));

            $this->error($e->getMessage());

            if ($e->getPrevious()) {
                throw $e->getPrevious();
            }

            throw $e;
        }
    }

    /** @return list<string> */
    protected function names(GeneratorType $type): array
    {
        return $this->generator($type)->all();
    }

    /** @return Generator<*> */
    protected function generator(GeneratorType $type): Generator
    {
        return $this->generators[$type->value] ??= new ($type->generator());
    }

    /** @return list<array{0:string,1:int,2:string}> */
    protected function getArguments(): array
    {
        $types = implode("|", GeneratorType::values());

        return [
            ['type', InputArgument::OPTIONAL, "The type of source file to create ({$types})"],
            ['name', InputArgument::OPTIONAL, 'The name of the source file'],
        ];
    }
}
