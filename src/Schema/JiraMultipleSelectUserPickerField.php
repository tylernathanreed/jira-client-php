<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraMultipleSelectUserPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        /** @var ?list<JiraUserField> */
        public ?array $users = null,
    ) {
    }
}
