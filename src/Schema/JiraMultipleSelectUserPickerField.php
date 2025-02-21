<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraMultipleSelectUserPickerFieldDoc
final readonly class JiraMultipleSelectUserPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public ?array $users = null,
    ) {
    }
}
