<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class WorkflowUpdateResponse extends Dto
{
    public function __construct(
        /**
         * List of updated statuses.
         * 
         * @var ?list<JiraWorkflowStatus>
         */
        public ?array $statuses = null,

        /** If there is a "asynchronous task" operation, as a result of this update. */
        public ?string $taskId = null,

        /**
         * List of updated workflows.
         * 
         * @var ?list<JiraWorkflow>
         */
        public ?array $workflows = null,
    ) {
    }
}
