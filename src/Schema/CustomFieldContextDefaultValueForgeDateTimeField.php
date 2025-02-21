<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueForgeDateTimeFieldDoc
final readonly class CustomFieldContextDefaultValueForgeDateTimeField extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        public string $type,

        /**
         * The default date-time in ISO format.
         * Ignored if `useCurrent` is true.
         */
        public ?string $dateTime = null,

        /** Whether to use the current date. */
        public ?bool $useCurrent = null,
    ) {
    }
}
