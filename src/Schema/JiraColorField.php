<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraColorField extends Dto
{
    public function __construct(
        public JiraColorInput $color,

        public string $fieldId,
    ) {
    }
}
