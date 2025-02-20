<?php

namespace App\Commands;

use App\Schema\Property;
use App\Schema\Schema;
use DateTimeImmutable;
use Illuminate\Console\GeneratorCommand;
use InvalidArgumentException;
use Jira\Client\Attributes\MapName;
use Override;
use RuntimeException;
use Symfony\Component\Console\Input\InputOption;

class MakeSchemaCommand extends GeneratorCommand
{
    /** @var string */
    protected $name = 'make:schema';

    /** @var string */
    protected $description = 'Display an inspiring quote';

    protected function schema(string $name): Schema
    {
        $filepath = 'https://dac-static.atlassian.com/cloud/jira/platform/swagger-v3.v3.json';

        $spec = json_decode(file_get_contents($filepath));

        $schemas = $spec->components->schemas;

        $name = $this->argument('name');

        if (! isset($schemas->{$name})) {
            throw new InvalidArgumentException("Unknown Schema [{$name}].");
        }

        return Schema::make($schemas->{$name});
    }

    #[Override]
    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        $schema = $this->schema($name);

        $stub = $this->replaceParent($stub, $schema);
        $stub = $this->replaceComment($stub, $schema);
        $stub = $this->replaceProperties($stub, $schema);
        $stub = $this->replacePolymorphism($stub, $schema);
        $stub = $this->replaceUnion($stub, $schema);
        $stub = $this->replaceIncludes($stub, $schema);

        return $stub;
    }

    #[Override]
    protected function replaceNamespace(&$stub, $name): static
    {
        $stub = str_replace('DummyNamespace', 'Jira\\Client\\Schema', $stub);

        return $this;
    }

    protected function replaceParent(string $stub, Schema $schema): string
    {
        return str_replace('DummyParent', $schema->isPolymorphic() ? 'PolymorphicDto' : 'Dto', $stub);
    }

    protected function replaceComment(string $stub, Schema $schema): string
    {
        $content = $schema->description->render();

        if (empty($content)) {
            return str_replace("\n// DummyComment", '', $stub);
        }

        return str_replace("\n// DummyComment\n", "\n" . $content, $stub);
    }

    protected function replaceProperties(string $stub, Schema $schema): string
    {
        $properties = array_map(fn ($property) => (string) $property, $schema->properties);

        $content = implode("\n\n", $properties);

        $stub = str_replace('{{ DummyProperties }}', $content, $stub);

        return $stub;
    }

    protected function replacePolymorphism(string $stub, Schema $schema): string
    {
        if (! $schema->isPolymorphic()) {
            return str_replace("\n\n    // DummyPolymorphism", '', $stub);
        }

        $map = '';
        $indent = str_repeat(' ', 12);

        foreach ($schema->discriminatorMap as $key => $class) {
            $map .= "{$indent}'{$key}' => {$class}::class,\n";
        }

        $map = rtrim($map, "\n");

        $stub = str_replace("    // DummyPolymorphism\n", <<<DOC
            public static function discriminator(): string
            {
                return '{$schema->discriminatorKey}';
            }

            /** @return array<string,class-string<Dto>> */
            public static function discriminatorMap(): array
            {
                return [
        {$map}
                ];
            }

        DOC, $stub);

        return str_replace(<<<DOC

            public function __construct(

            ) {
            }

        DOC, '', $stub);
    }

    protected function replaceUnion(string $stub, Schema $schema): string
    {
        if (! $schema->isUnionType()) {
            return str_replace("\n    // DummyUnion", '', $stub);
        }

        $types = '';
        $indent = str_repeat(' ', 12);

        foreach ($schema->unionTypes as $type) {
            $types .= "{$indent}{$type}::class,\n";
        }

        $types = rtrim($types, "\n");

        $stub = str_replace("    // DummyUnion\n", <<<DOC

            /** @return list<class-string<Dto>> */
            public function unionTypes(): array
            {
                return [
        {$types}
                ];
            }

        DOC, $stub);

        return str_replace(<<<DOC

            public function __construct(

            ) {
            }

        DOC, '', $stub);
    }

    protected function replaceIncludes(string $stub, Schema $schema): string
    {
        $includes = [];

        if ($schema->hasDateTime()) {
            $includes[] = DateTimeImmutable::class;
        }

        if ($schema->hasMappedPropertyName()) {
            $includes[] = MapName::class;
        }

        $content = implode("\n", array_map(fn ($v) => "use {$v};", $includes));

        if (! empty($content)) {
            $content .= "\n";
        }

        return str_replace("// DummyIncludes\n", $content, $stub);
    }

    #[Override]
    protected function qualifyClass($name)
    {
        return $name;
    }

    #[Override]
    protected function getPath($name): string
    {
        $basePath = realpath('./');

        $directory = $basePath . '/src/Schema/';

        return $directory . $name . '.php';
    }

    #[Override]
    protected function getStub(): string
    {
        $basePath = realpath(__DIR__ . '/../../');

        $directory = $basePath . '/stubs/';

        return $directory . 'Schema.stub.php';
    }

    #[Override]
    protected function getOptions(): array
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the mailable already exists'],
        ];
    }
}
