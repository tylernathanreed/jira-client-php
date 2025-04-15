<?php

namespace Reedware\OpenApi;

readonly class Configuration
{
    public function __construct(
        public string $namespace,
        public string $src,
    ) {
    }
}
