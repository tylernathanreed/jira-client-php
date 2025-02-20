<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default value for a Date custom field. */
final readonly class CustomFieldContextDefaultValueDate extends Dto
{
    public function __construct(
        public string $type,

        /**
         * The default date in ISO format.
         * Ignored if `useCurrent` is true.
         */
        public ?string $date = null,

        /** Whether to use the current date. */
        public ?bool $useCurrent = null,
    ) {
    }

}
