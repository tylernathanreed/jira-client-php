<?php

namespace Reedware\OpenApi\Generators;

use Override;
use Reedware\OpenApi\Schema\AbstractSchema;

/**
 * @phpstan-template TSchema of AbstractSchema
 *
 * @extends AbstractComposableFileGenerator<TSchema>
 */
abstract class AbstractSourceGenerator extends AbstractComposableFileGenerator
{
    /** @return list<string> */
    public function existing(): array
    {
        return array_map(function (string $filepath) {
            return basename($filepath, '.php');
        }, glob($this->directory() . '/*.php') ?: []);
    }

    #[Override]
    protected function getPath(object $composable): string
    {
        return strtr('{directory}/{name}.php', [
            '{directory}' => $this->directory(),
            '{name}' => ucfirst($this->name($composable)),
        ]);
    }

    protected function directory(): string
    {
        return strtr('{basePath}/src/{type}', [
            '{basePath}' => realpath('./'),
            '{type}' => $this->type(),
        ]);
    }

    #[Override]
    protected function getStub(): string
    {
        return strtr('{basePath}/stubs/{type}.stub.php', [
            '{basePath}' => realpath(__DIR__ . '/../../'),
            '{type}' => $this->type(),
        ]);
    }

    protected function type(): string
    {
        return substr(class_basename(static::class), 0, -strlen('SourceGenerator'));
    }
}
