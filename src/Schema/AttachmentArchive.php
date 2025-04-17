<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class AttachmentArchive extends Dto
{
    public function __construct(
        /** @var ?list<AttachmentArchiveEntry> */
        public ?array $entries = null,

        public ?bool $moreAvailable = null,

        public ?int $totalEntryCount = null,

        public ?int $totalNumberOfEntriesAvailable = null,
    ) {
    }
}
