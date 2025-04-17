<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of the instance's attachment settings. */
final class AttachmentSettings extends Dto
{
    public function __construct(
        /** Whether the ability to add attachments is enabled. */
        public ?bool $enabled = null,

        /** The maximum size of attachments permitted, in bytes. */
        public ?int $uploadLimit = null,
    ) {
    }
}
