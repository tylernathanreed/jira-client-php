<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of workflows and related statuses. */
final class WorkflowReadResponse extends Dto
{
    public function __construct(
        /**
         * List of statuses.
         * 
         * @var ?list<JiraWorkflowStatus>
         */
        public ?array $statuses = null,

        /**
         * List of workflows.
         * 
         * @var ?list<JiraWorkflow>
         */
        public ?array $workflows = null,
    ) {
    }
}
