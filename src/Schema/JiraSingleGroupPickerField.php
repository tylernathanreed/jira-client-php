<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraSingleGroupPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraGroupInput $group,
    ) {
    }
}
