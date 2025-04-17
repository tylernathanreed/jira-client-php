<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraGroupInput extends Dto
{
    public function __construct(
        public string $groupName,
    ) {
    }
}
