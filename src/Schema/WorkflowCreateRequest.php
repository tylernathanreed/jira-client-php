<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The create workflows payload. */
final readonly class WorkflowCreateRequest extends Dto
{
    public function __construct(
        public WorkflowScope $scope,

        /**
         * The statuses to associate with the workflows.
         * 
         * @var list<WorkflowStatusUpdate>
         */
        public array $statuses,

        /**
         * The details of the workflows to create.
         * 
         * @var list<WorkflowCreate>
         */
        public array $workflows,
    ) {
    }
}
