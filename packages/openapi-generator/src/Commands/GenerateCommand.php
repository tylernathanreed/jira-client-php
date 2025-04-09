<?php

namespace Reedware\OpenApi\Commands;

use Reedware\OpenApi\Contracts\SupportsReadmeGenerator;
use Reedware\OpenApi\Contracts\SupportsTestGenerator;
use Reedware\OpenApi\Enums\GeneratorType;
use Reedware\OpenApi\Exceptions\ClassGenerationException;
use Reedware\OpenApi\Exceptions\CommandFailedException;
use Reedware\OpenApi\Generators\AbstractSchemaGenerator;
use Reedware\OpenApi\Generators\Generator;
use Reedware\OpenApi\Generators\RepositoryReadmeGenerator;
use Override;
use Reedware\OpenApi\Configuration;
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
        $config = $this->readConfig();

        if ($this->argument('type') === 'readme') {
            $this->generateRepositoryReadmeFile();

            return 0;
        }

        [$type, $name] = $this->validated();

        $this->generate($config, $type, $name);

        return 0;
    }

    protected function readConfig(): Configuration
    {
        $contents = file_get_contents($this->basePath . '/openapi.json');

        if ($contents === false) {
            throw new CommandFailedException('Unable to find openapi.json configuration');
        }

        $json = json_decode($contents);

        return new Configuration(
            namespace: $json->namespace
        );
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

    protected function generate(Configuration $config, ?GeneratorType $type, ?string $name): void
    {
        if (! is_null($type) && ! is_null($name)) {
            $this->generateAssets($config, $type, $name);
        } elseif (! is_null($type)) {
            $this->generateType($config, $type);
        } else {
            $this->generateAll($config);
        }
    }

    protected function generateAssets(Configuration $config, GeneratorType $type, string $name): void
    {
        $path = $this->generateSourceFile($config, $type, $name);

        if ($type->supportsTestGenerator()) {
            $this->generateTestFile($config, $type, $name);
        }

        if ($type->supportsReadmeGenerator()) {
            $this->generateReadmeFile($config, $type, $name);
        }

        $this->success(sprintf(
            '%s [%s] created successfully.',
            $type->name,
            $path
        ));
    }

    protected function generateSourceFile(Configuration $config, GeneratorType $type, string $name): string
    {
        $generator = $this->generator($type);

        return $this->runGenerator($config, $generator, $type, 'source', $name);
    }

    protected function generateTestFile(Configuration $config, GeneratorType $type, string $name): string
    {
        /** @var Generator<*>&SupportsTestGenerator<*> */
        $sourceGenerator = $this->generator($type);

        $testGenerator = $sourceGenerator->getTestGenerator();

        return $this->runGenerator($config, $testGenerator, $type, 'test', $name);
    }

    protected function generateReadmeFile(Configuration $config, GeneratorType $type, string $name): string
    {
        /** @var Generator<*>&SupportsReadmeGenerator<*> */
        $sourceGenerator = $this->generator($type);

        $readmeGenerator = $sourceGenerator->getReadmeGenerator();

        return $this->runGenerator($config, $readmeGenerator, $type, 'readme', $name);
    }

    protected function generateType(Configuration $config, GeneratorType $type): void
    {
        $generator = $this->generator($type);

        $generated = [];

        $missing = array_fill_keys($generator->existing(), true);

        foreach ($this->names($type) as $name) {
            if (isset($generated[ucfirst($name)])) {
                continue;
            }

            $this->generateAssets($config, $type, $name);

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

    protected function generateAll(Configuration $config): void
    {
        foreach (GeneratorType::cases() as $type) {
            $this->generateType($config, $type);
        }

        $this->generateRepositoryReadmeFile($config);
    }

    protected function generateRepositoryReadmeFile(Configuration $config): void
    {
        (new RepositoryReadmeGenerator())->generate();

        $this->success('Repository README created successfully.');
    }

    /** @param AbstractSchemaGenerator<*> $generator */
    protected function runGenerator(
        Configuration $config,
        AbstractSchemaGenerator $generator,
        GeneratorType $type,
        string $asset,
        string $name
    ): string {
        if (method_exists($generator, 'setConfiguration')) {
            $generator->setConfiguration($config);
        }

        if (method_exists($generator, 'setBasePath')) {
            $generator->setBasePath($this->basePath);
        }

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
        if (isset($this->generators[$type->value])) {
            return $this->generators[$type->value];
        }

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
