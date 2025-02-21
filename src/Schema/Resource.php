<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ResourceDoc
final readonly class Resource extends Dto
{
    public function __construct(
        public ?string $description = null,

        public ?string $file = null,

        public ?string $filename = null,

        public ?object $inputStream = null,

        public ?bool $open = null,

        public ?bool $readable = null,

        public ?string $uri = null,

        public ?string $url = null,
    ) {
    }
}
