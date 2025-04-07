<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class AttachmentArchive extends Dto
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
