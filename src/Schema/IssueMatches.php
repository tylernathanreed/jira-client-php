<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueMatchesDoc
final readonly class IssueMatches extends Dto
{
    public function __construct(
        public array $matches,
    ) {
    }
}
