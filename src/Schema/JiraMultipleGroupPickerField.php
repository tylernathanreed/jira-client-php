<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraMultipleGroupPickerFieldDoc
final readonly class JiraMultipleGroupPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public array $groups,
    ) {
    }
}
