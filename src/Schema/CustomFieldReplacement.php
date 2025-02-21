<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about the replacement for a deleted version. */
final readonly class CustomFieldReplacement extends Dto
{
    public function __construct(
        /** The ID of the custom field in which to replace the version number. */
        public ?int $customFieldId = null,

        /** The version number to use as a replacement for the deleted version. */
        public ?int $moveTo = null,
    ) {
    }
}
