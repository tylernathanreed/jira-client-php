<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class Attachment extends Dto
{
    public function __construct(
        /** Details of the user who added the attachment. */
        public ?UserDetails $author = null,

        /** The content of the attachment. */
        public ?string $content = null,

        /** The datetime the attachment was created. */
        public ?string $created = null,

        /** The file name of the attachment. */
        public ?string $filename = null,

        /** The ID of the attachment. */
        public ?string $id = null,

        /** The MIME type of the attachment. */
        public ?string $mimeType = null,

        /** The URL of the attachment details response. */
        public ?string $self = null,

        /** The size of the attachment. */
        public ?int $size = null,

        /** The URL of a thumbnail representing the attachment. */
        public ?string $thumbnail = null,
    ) {
    }
}
