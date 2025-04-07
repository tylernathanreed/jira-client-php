<?php

namespace Reedware\OpenApi\Generators;

use Reedware\OpenApi\Schema\AbstractSchema;

/**
 * @phpstan-template TSchema of AbstractSchema
 *
 * @extends AbstractSchemaGenerator<TSchema>
 */
abstract class Generator extends AbstractSchemaGenerator
{
    /** @return list<string> */
    abstract public function all(): array;

    /** @return list<string> */
    public function existing(): array
    {
        return array_map(function (string $filepath) {
            return basename($filepath, '.php');
        }, glob($this->directory() . '/*.php') ?: []);
    }

    protected function getPath(string $name): string
    {
        return strtr('{directory}/{name}.php', [
            '{directory}' => $this->directory(),
            '{name}' => ucfirst($name),
        ]);
    }

    protected function directory(): string
    {
        return strtr('{basePath}/src/{type}', [
            '{basePath}' => realpath('./'),
            '{type}' => $this->type(),
        ]);
    }

    protected function getStub(): string
    {
        return strtr('{basePath}/stubs/{type}.stub.php', [
            '{basePath}' => realpath(__DIR__ . '/../../'),
            '{type}' => $this->type(),
        ]);
    }

    protected function type(): string
    {
        return substr(class_basename(static::class), 0, -strlen('Generator'));
    }
}
