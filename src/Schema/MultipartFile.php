<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class MultipartFile extends Dto
{
    public function __construct(
        /** @var ?list<string> */
        public ?array $bytes = null,

        public ?string $contentType = null,

        public ?bool $empty = null,

        /** @var array<string,mixed> */
        public ?array $inputStream = null,

        public ?string $name = null,

        public ?string $originalFilename = null,

        public ?Resource $resource = null,

        public ?int $size = null,
    ) {
    }
}
