<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkIssueIsWatchingDoc
final readonly class BulkIssueIsWatching extends Dto
{
    public function __construct(
        /**
         * The map of issue ID to boolean watch status.
         * 
         * @var array<string,boolean>
         */
        public ?array $issuesIsWatching = null,
    ) {
    }
}
