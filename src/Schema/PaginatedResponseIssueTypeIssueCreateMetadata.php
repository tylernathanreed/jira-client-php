<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class PaginatedResponseIssueTypeIssueCreateMetadata extends Dto
{
    public function __construct(
        public ?int $maxResults = null,

        /** @var ?list<IssueTypeIssueCreateMetadata> */
        public ?array $results = null,

        public ?int $startAt = null,

        public ?int $total = null,
    ) {
    }
}
