<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class IssuesUpdateBean extends Dto
{
    public function __construct(
        /** @var ?list<IssueUpdateDetails> */
        public ?array $issueUpdates = null,
    ) {
    }
}
