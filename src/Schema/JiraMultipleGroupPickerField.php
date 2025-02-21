<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraMultipleGroupPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public array $groups,
    ) {
    }
}
