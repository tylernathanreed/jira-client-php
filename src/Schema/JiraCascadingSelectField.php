<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraCascadingSelectFieldDoc
final readonly class JiraCascadingSelectField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraSelectedOptionField $parentOptionValue,

        public ?JiraSelectedOptionField $childOptionValue = null,
    ) {
    }
}
