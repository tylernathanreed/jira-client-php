<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraColorFieldDoc
final readonly class JiraColorField extends Dto
{
    public function __construct(
        public JiraColorInput $color,

        public string $fieldId,
    ) {
    }
}
