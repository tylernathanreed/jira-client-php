<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The statuses associated with each workflow. */
final readonly class StatusesPerWorkflow extends Dto
{
    public function __construct(
        /** The ID of the initial status for the workflow. */
        public ?string $initialStatusId = null,

        /**
         * The status IDs associated with the workflow.
         * 
         * @var ?list<string>
         */
        public ?array $statuses = null,

        /** The ID of the workflow. */
        public ?string $workflowId = null,
    ) {
    }
}
