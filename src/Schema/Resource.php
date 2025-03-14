<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class Resource extends Dto
{
    public function __construct(
        public ?string $description = null,

        public ?string $file = null,

        public ?string $filename = null,

        /** @var array<string,mixed> */
        public ?array $inputStream = null,

        public ?bool $open = null,

        public ?bool $readable = null,

        public ?string $uri = null,

        public ?string $url = null,
    ) {
    }
}
