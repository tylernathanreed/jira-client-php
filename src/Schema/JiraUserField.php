<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraUserFieldDoc
final readonly class JiraUserField extends Dto
{
    public function __construct(
        public string $accountId,
    ) {
    }
}
