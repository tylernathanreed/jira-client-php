<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Schema\AbstractSchema;

/**
 * @phpstan-template TSchema of AbstractSchema
 *
 * @extends AbstractSchemaGenerator<TSchema>
 */
abstract class TestGenerator extends AbstractSchemaGenerator
{
    protected function getPath(string $name): string
    {
        return strtr('{basePath}/tests/Unit/{type}/{name}Test.php', [
            '{basePath}' => realpath('./'),
            '{type}' => $this->type(),
            '{name}' => ucfirst($name),
        ]);
    }

    protected function getStub(): string
    {
        return strtr('{basePath}/stubs/{type}Test.stub.php', [
            '{basePath}' => realpath(__DIR__ . '/../../'),
            '{type}' => $this->type(),
        ]);
    }

    protected function type(): string
    {
        return substr(class_basename(static::class), 0, -strlen('TestGenerator'));
    }
}
