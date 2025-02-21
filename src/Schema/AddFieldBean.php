<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// AddFieldBeanDoc
final readonly class AddFieldBean extends Dto
{
    public function __construct(
        /** The ID of the field to add. */
        public string $fieldId,
    ) {
    }
}
