<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraSelectedOptionFieldDoc
final readonly class JiraSelectedOptionField extends Dto
{
    public function __construct(
        public ?int $optionId = null,
    ) {
    }
}
