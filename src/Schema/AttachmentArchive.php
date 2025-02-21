<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class AttachmentArchive extends Dto
{
    public function __construct(
        public ?array $entries = null,

        public ?bool $moreAvailable = null,

        public ?int $totalEntryCount = null,

        public ?int $totalNumberOfEntriesAvailable = null,
    ) {
    }
}
