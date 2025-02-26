<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default value for a date time custom field. */
final readonly class CustomFieldContextDefaultValueDateTime extends Dto
{
    public function __construct(
        public string $type,

        /**
         * The default date-time in ISO format.
         * Ignored if `useCurrent` is true.
         */
        public ?string $dateTime = null,

        /** Whether to use the current date. */
        public ?bool $useCurrent = false,
    ) {
    }
}
