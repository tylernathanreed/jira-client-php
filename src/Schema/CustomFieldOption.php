<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldOptionDoc
final readonly class CustomFieldOption extends Dto
{
    public function __construct(
        /** The URL of these custom field option details. */
        public ?string $self = null,

        /** The value of the custom field option. */
        public ?string $value = null,
    ) {
    }
}
