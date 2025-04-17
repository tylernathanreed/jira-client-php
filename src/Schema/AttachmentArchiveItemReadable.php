<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Metadata for an item in an attachment archive. */
final class AttachmentArchiveItemReadable extends Dto
{
    public function __construct(
        /** The position of the item within the archive. */
        public ?int $index = null,

        /** The label for the archive item. */
        public ?string $label = null,

        /** The MIME type of the archive item. */
        public ?string $mediaType = null,

        /** The path of the archive item. */
        public ?string $path = null,

        /** The size of the archive item. */
        public ?string $size = null,
    ) {
    }
}
