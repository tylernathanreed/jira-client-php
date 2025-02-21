<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of requested issues & fields. */
final readonly class BulkIssueResults extends Dto
{
    public function __construct(
        /**
         * When Jira can't return an issue enumerated in a request due to a retriable error or payload constraint, we'll return the respective issue ID with a corresponding error message.
         * This list is empty when there are no errors Issues which aren't found or that the user doesn't have permission to view won't be returned in this list.
         * 
         * @var ?list<IssueError>
         */
        public ?array $issueErrors = null,

        /**
         * The list of issues.
         * 
         * @var ?list<IssueBean>
         */
        public ?array $issues = null,
    ) {
    }
}
