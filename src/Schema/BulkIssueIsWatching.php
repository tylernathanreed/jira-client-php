<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A container for the watch status of a list of issues. */
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
