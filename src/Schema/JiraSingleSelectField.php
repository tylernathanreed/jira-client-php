<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraSingleSelectFieldDoc
final readonly class JiraSingleSelectField extends Dto
{
    public function __construct(
        public string $fieldId,

        public JiraSelectedOptionField $option,
    ) {
    }
}
