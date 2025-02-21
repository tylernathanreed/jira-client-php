<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a custom field option for a context. */
final readonly class CustomFieldOptionUpdate extends Dto
{
    public function __construct(
        /** The ID of the custom field option. */
        public string $id,

        /** Whether the option is disabled. */
        public ?bool $disabled = null,

        /** The value of the custom field option. */
        public ?string $value = null,
    ) {
    }
}
