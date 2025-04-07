<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraSingleGroupPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraGroupInput $group,
    ) {
    }
}
