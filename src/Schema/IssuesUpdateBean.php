<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class IssuesUpdateBean extends Dto
{
    public function __construct(
        /** @var ?list<IssueUpdateDetails> */
        public ?array $issueUpdates = null,
    ) {
    }
}
