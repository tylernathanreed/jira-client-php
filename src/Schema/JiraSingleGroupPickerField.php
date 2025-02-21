<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraSingleGroupPickerFieldDoc
final readonly class JiraSingleGroupPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraGroupInput $group,
    ) {
    }
}
