<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final readonly class AttachmentArchiveEntry extends Dto
{
    public function __construct(
        public ?string $abbreviatedName = null,

        public ?int $entryIndex = null,

        public ?string $mediaType = null,

        public ?string $name = null,

        public ?int $size = null,
    ) {
    }
}
