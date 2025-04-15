<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final readonly class JiraSingleSelectUserPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public ?JiraUserField $user = null,
    ) {
    }
}
