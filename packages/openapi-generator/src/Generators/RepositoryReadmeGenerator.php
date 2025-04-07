<?php

namespace Reedware\OpenApi\Generators;

use Reedware\OpenApi\Markdown\Link;
use Reedware\OpenApi\Schema\Specification;
use Reedware\OpenApi\Utils;
use RuntimeException;

class RepositoryReadmeGenerator
{
    public function generate(): string
    {
        $path = $this->getPath();

        $this->write($path, $this->build());

        return $path;
    }

    protected function build(): string
    {
        $stub = $this->stub();

        if ($stub === false) {
            throw new RuntimeException('Failed to open stub [' . $this->getStub() . '].');
        }

        $stub = $this->replaceOperationsList($stub);
        $stub = $this->replaceSchemaList($stub);

        return $stub;
    }

    protected function replaceOperationsList(string $stub): string
    {
        $groups = Specification::getOperationGroups();

        $contents = '';

        foreach ($groups as $name => $group) {
            $header = Utils::title($name);

            if (! empty($contents)) {
                $contents .= "\n";
            }

            $contents .= "#### {$header}\n";

            foreach ($group as $id => $operation) {
                $contents .= '- ' . new Link(
                    Utils::title($operation['operation']['summary'] ?? $operation['id']),
                    '/docs/operations/' . Utils::slug($name) . '.md#' . $id
                ) . "\n";
            }
        }

        return str_replace('DummyOperationsList', $contents, $stub);
    }

    protected function replaceSchemaList(string $stub): string
    {
        $schemas = Specification::getComponentSchemas();

        $contents = '';

        $header = null;

        foreach ($schemas as $name => $schema) {
            $letter = $name[0];

            if ($letter !== $header) {
                if (! is_null($header)) {
                    $contents .= "\n";
                }

                $header = $letter;
                $contents .= "#### {$header}\n";
            }

            $contents .= '- ' . new Link($name, '/docs/schema/' . Utils::slug($name) . '.md') . "\n";
        }

        return str_replace('DummySchemaList', $contents, $stub);
    }

    protected function getPath(): string
    {
        return realpath(__DIR__ . '/../../') . '/README.md';
    }

    protected function getStub(): string
    {
        return realpath(__DIR__ . '/../../') . '/stubs/README.stub.md';
    }

    protected function write(string $path, string $contents): int|false
    {
        return file_put_contents($path, $contents);
    }

    protected function stub(): string|false
    {
        return file_get_contents($this->getStub());
    }
}
