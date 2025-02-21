<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraSingleVersionPickerFieldDoc
final readonly class JiraSingleVersionPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraVersionField $version,
    ) {
    }
}
