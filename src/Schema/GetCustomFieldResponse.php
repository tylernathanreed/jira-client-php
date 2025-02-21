<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// GetCustomFieldResponseDoc
final readonly class GetCustomFieldResponse extends Dto
{
    public function __construct(
        /** The custom field ID. */
        public int $customFieldId,

        /** Allows filtering issues based on their values for the custom field. */
        public ?bool $filter = null,
    ) {
    }
}
