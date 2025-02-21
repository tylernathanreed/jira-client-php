<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkChangelogResponseBeanDoc
final readonly class BulkChangelogResponseBean extends Dto
{
    public function __construct(
        /**
         * The list of issues changelogs.
         * 
         * @var ?list<IssueChangeLog>
         */
        public ?array $issueChangeLogs = null,

        /**
         * Continuation token to fetch the next page.
         * If this result represents the last or the only page, this token will be null.
         */
        public ?string $nextPageToken = null,
    ) {
    }
}
