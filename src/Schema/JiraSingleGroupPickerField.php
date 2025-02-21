<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraSingleGroupPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraGroupInput $group,
    ) {
    }
}
