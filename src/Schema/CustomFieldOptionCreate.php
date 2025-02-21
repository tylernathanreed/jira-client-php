<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldOptionCreateDoc
final readonly class CustomFieldOptionCreate extends Dto
{
    public function __construct(
        /** The value of the custom field option. */
        public string $value,

        /** Whether the option is disabled. */
        public ?bool $disabled = null,

        /** For cascading options, the ID of a parent option. */
        public ?string $optionId = null,
    ) {
    }
}
