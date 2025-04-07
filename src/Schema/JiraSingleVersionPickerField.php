<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraSingleVersionPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraVersionField $version,
    ) {
    }
}
