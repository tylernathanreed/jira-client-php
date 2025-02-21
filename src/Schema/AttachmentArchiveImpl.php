<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class AttachmentArchiveImpl extends Dto
{
    public function __construct(
        /**
         * The list of the items included in the archive.
         * 
         * @var ?list<AttachmentArchiveEntry>
         */
        public ?array $entries = null,

        /** The number of items in the archive. */
        public ?int $totalEntryCount = null,
    ) {
    }
}
