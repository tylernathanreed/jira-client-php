<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A change item. */
final readonly class ChangeDetails extends Dto
{
    public function __construct(
        /** The name of the field changed. */
        public ?string $field = null,

        /** The ID of the field changed. */
        public ?string $fieldId = null,

        /** The type of the field changed. */
        public ?string $fieldtype = null,

        /** The details of the original value. */
        public ?string $from = null,

        /** The details of the original value as a string. */
        public ?string $fromString = null,

        /** The details of the new value. */
        public ?string $to = null,

        /** The details of the new value as a string. */
        public ?string $toString = null,
    ) {
    }
}
