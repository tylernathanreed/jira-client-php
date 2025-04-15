<?php

namespace Reedware\OpenApi\Generators;

use Reedware\OpenApi\Configuration;
use Reedware\OpenApi\Filesystem;

abstract class AbstractGenerator
{
    use Concerns\ValidatesReservedWords;

    public final function __construct(
        protected string $basePath,
        protected Configuration $config,
        protected Filesystem $filesystem,
    ) {}

    /**
     * @phpstan-template TGenerator of AbstractGenerator
     * 
     * @param class-string<TGenerator> $class
     * @return TGenerator
     */
    public function newGenerator(string $class): AbstractGenerator
    {
        return new $class($this->basePath, $this->config, $this->filesystem);
    }
}
