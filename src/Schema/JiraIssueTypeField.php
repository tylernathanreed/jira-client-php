<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraIssueTypeField extends Dto
{
    public function __construct(
        public string $issueTypeId,
    ) {
    }
}
