<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class BulkIssueIsWatching extends Dto
{
    public function __construct(
        /** The map of issue ID to boolean watch status. */
        public ?object $issuesIsWatching = null,
    ) {
    }
}
