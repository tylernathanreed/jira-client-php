<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the created workflows and statuses. */
final readonly class WorkflowCreateResponse extends Dto
{
    public function __construct(
        /**
         * List of created statuses.
         * 
         * @var ?list<JiraWorkflowStatus>
         */
        public ?array $statuses = null,

        /**
         * List of created workflows.
         * 
         * @var ?list<JiraWorkflow>
         */
        public ?array $workflows = null,
    ) {
    }
}
