<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusWorkflowUsagePageDoc
final readonly class StatusWorkflowUsagePage extends Dto
{
    public function __construct(
        /** Page token for the next page of issue type usages. */
        public ?string $nextPageToken = null,

        /**
         * The list of statuses.
         * 
         * @var ?list<StatusWorkflowUsageWorkflow>
         */
        public ?array $values = null,
    ) {
    }
}
