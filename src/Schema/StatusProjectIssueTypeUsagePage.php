<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusProjectIssueTypeUsagePageDoc
final readonly class StatusProjectIssueTypeUsagePage extends Dto
{
    public function __construct(
        /** Page token for the next page of issue type usages. */
        public ?string $nextPageToken = null,

        /**
         * The list of issue types.
         * 
         * @var ?list<StatusProjectIssueTypeUsage>
         */
        public ?array $values = null,
    ) {
    }
}
