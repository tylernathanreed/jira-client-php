<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Schema\AbstractSchema;
use Jira\CodeGen\Utils;

/**
 * @phpstan-template TSchema of AbstractSchema
 *
 * @extends AbstractSchemaGenerator<TSchema>
 */
abstract class ReadmeGenerator extends AbstractSchemaGenerator
{
    protected function getPath(string $name): string
    {
        return strtr('{basePath}/docs/{type}/{name}.md', [
            '{basePath}' => realpath('./'),
            '{type}' => Utils::slug($this->type()),
            '{name}' => Utils::slug($name),
        ]);
    }

    protected function getStub(): string
    {
        return strtr('{basePath}/stubs/{type}.stub.md', [
            '{basePath}' => realpath(__DIR__ . '/../../'),
            '{type}' => Utils::slug($this->type()),
        ]);
    }

    protected function type(): string
    {
        return substr(class_basename(static::class), 0, -strlen('ReadmeGenerator'));
    }
}
