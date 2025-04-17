<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraIssueTypeField extends Dto
{
    public function __construct(
        public string $issueTypeId,
    ) {
    }
}
