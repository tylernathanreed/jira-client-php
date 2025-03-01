<?php

namespace Jira\CodeGen\Generators;

use Jira\CodeGen\Exceptions\ClassAlreadyExistsException;
use Jira\CodeGen\Exceptions\ReservedWordException;
use Jira\CodeGen\Replacers\Replacer;
use Jira\CodeGen\Replacers\SortImportsReplacer;
use Jira\CodeGen\Schema\AbstractSchema;

/**
 * @phpstan-template TSchema of AbstractSchema
 */
abstract class Generator
{
    /** @var list<class-string<Replacer>> */
    protected $replacers = [];

    /** @var list<string> */
    protected $reservedNames = [
        '__halt_compiler',
        'abstract',
        'and',
        'array',
        'as',
        'break',
        'callable',
        'case',
        'catch',
        'class',
        'clone',
        'const',
        'continue',
        'declare',
        'default',
        'die',
        'do',
        'echo',
        'else',
        'elseif',
        'empty',
        'enddeclare',
        'endfor',
        'endforeach',
        'endif',
        'endswitch',
        'endwhile',
        'enum',
        'eval',
        'exit',
        'extends',
        'false',
        'final',
        'finally',
        'fn',
        'for',
        'foreach',
        'function',
        'global',
        'goto',
        'if',
        'implements',
        'include',
        'include_once',
        'instanceof',
        'insteadof',
        'interface',
        'isset',
        'list',
        'match',
        'namespace',
        'new',
        'or',
        'parent',
        'print',
        'private',
        'protected',
        'public',
        'readonly',
        'require',
        'require_once',
        'return',
        'self',
        'static',
        'switch',
        'throw',
        'trait',
        'true',
        'try',
        'unset',
        'use',
        'var',
        'while',
        'xor',
        'yield',
        '__CLASS__',
        '__DIR__',
        '__FILE__',
        '__FUNCTION__',
        '__LINE__',
        '__METHOD__',
        '__NAMESPACE__',
        '__TRAIT__',
    ];

    /** @return list<string> */
    abstract public function all(): array;

    public function generate(string $name, bool $force = false): string
    {
        if ($this->isReservedName($name)) {
            throw new ReservedWordException($name);
        }

        $path = $this->getPath($name);

        if (! $force && $this->alreadyExists($path)) {
            throw new ClassAlreadyExistsException($this->type(), $name);
        }

        $this->makeDirectory($path);

        $this->write($path, $this->build($name));

        return $path;
    }

    protected function build(string $name): string
    {
        $schema = $this->schema($name);

        $stub = $this->stub();

        $replacers = $this->replacers;

        $replacers[] = SortImportsReplacer::class;

        foreach ($replacers as $replacer) {
            $stub = (new $replacer())->replace($schema, $stub);
        }

        return $stub;
    }

    /** @return TSchema */
    abstract protected function schema(string $name): AbstractSchema;

    protected function isReservedName(string $name): bool
    {
        return in_array(strtolower($name), array_map('strtolower', $this->reservedNames));
    }

    protected function alreadyExists(string $path): bool
    {
        return file_exists($path);
    }

    protected function makeDirectory(string $path): string
    {
        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        return $path;
    }

    protected function write(string $path, string $contents): ?int
    {
        return file_put_contents($path, $contents);
    }

    protected function stub(): string
    {
        return file_get_contents($this->getStub());
    }

    protected function getPath($name): string
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
