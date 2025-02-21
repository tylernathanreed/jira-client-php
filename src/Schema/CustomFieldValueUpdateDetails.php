<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldValueUpdateDetailsDoc
final readonly class CustomFieldValueUpdateDetails extends Dto
{
    public function __construct(
        /**
         * The list of custom field update details.
         * 
         * @var ?list<CustomFieldValueUpdate>
         */
        public ?array $updates = null,
    ) {
    }
}
