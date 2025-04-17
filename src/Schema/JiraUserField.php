<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraUserField extends Dto
{
    public function __construct(
        public string $accountId,
    ) {
    }
}
