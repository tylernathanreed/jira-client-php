<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraSingleVersionPickerField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraVersionField $version,
    ) {
    }
}
