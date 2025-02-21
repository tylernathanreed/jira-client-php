<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// AttachmentMetadataDoc
final readonly class AttachmentMetadata extends Dto
{
    public function __construct(
        /** Details of the user who attached the file. */
        public ?User $author = null,

        /** The URL of the attachment. */
        public ?string $content = null,

        /** The datetime the attachment was created. */
        public ?DateTimeImmutable $created = null,

        /** The name of the attachment file. */
        public ?string $filename = null,

        /** The ID of the attachment. */
        public ?int $id = null,

        /** The MIME type of the attachment. */
        public ?string $mimeType = null,

        /** Additional properties of the attachment. */
        public ?object $properties = null,

        /** The URL of the attachment metadata details. */
        public ?string $self = null,

        /** The size of the attachment. */
        public ?int $size = null,

        /** The URL of a thumbnail representing the attachment. */
        public ?string $thumbnail = null,
    ) {
    }
}
