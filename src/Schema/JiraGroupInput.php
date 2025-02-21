<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraGroupInputDoc
final readonly class JiraGroupInput extends Dto
{
    public function __construct(
        public string $groupName,
    ) {
    }
}
