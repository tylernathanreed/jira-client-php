<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Schema\AbstractSchema;

/**
 * @phpstan-template TSchema of AbstractSchema
 *
 * @extends AbstractSchemaGenerator<TSchema>
 */
abstract class Generator extends AbstractSchemaGenerator
{
    /** @return list<string> */
    abstract public function all(): array;

    protected function getPath(string $name): string
    {
        return strtr('{basePath}/src/{type}/{name}.php', [
            '{basePath}' => realpath('./'),
            '{type}' => $this->type(),
            '{name}' => ucfirst($name),
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
