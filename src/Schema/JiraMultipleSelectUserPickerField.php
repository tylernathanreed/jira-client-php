<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraMultipleSelectUserPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        /** @var ?list<JiraUserField> */
        public ?array $users = null,
    ) {
    }
}
