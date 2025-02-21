<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A page of issue types. */
final readonly class WorkflowProjectIssueTypeUsagePage extends Dto
{
    public function __construct(
        /** Token for the next page of issue type usages. */
        public ?string $nextPageToken = null,

        /**
         * The list of issue types.
         * 
         * @var ?list<WorkflowProjectIssueTypeUsage>
         */
        public ?array $values = null,
    ) {
    }
}
