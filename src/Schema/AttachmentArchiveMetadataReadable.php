<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Metadata for an archive (for example a zip) and its contents. */
final readonly class AttachmentArchiveMetadataReadable extends Dto
{
    public function __construct(
        /**
         * The list of the items included in the archive.
         * 
         * @var ?list<AttachmentArchiveItemReadable>
         */
        public ?array $entries = null,

        /** The ID of the attachment. */
        public ?int $id = null,

        /** The MIME type of the attachment. */
        public ?string $mediaType = null,

        /** The name of the archive file. */
        public ?string $name = null,

        /** The number of items included in the archive. */
        public ?int $totalEntryCount = null,
    ) {
    }
}
