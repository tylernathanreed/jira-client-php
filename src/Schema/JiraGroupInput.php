<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraGroupInput extends Dto
{
    public function __construct(
        public string $groupName,
    ) {
    }
}
