<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The create workflows payload. */
final readonly class WorkflowCreateRequest extends Dto
{
    public function __construct(
        public ?WorkflowScope $scope = null,

        /**
         * The statuses to associate with the workflows.
         * 
         * @var ?list<WorkflowStatusUpdate>
         */
        public ?array $statuses = null,

        /**
         * The details of the workflows to create.
         * 
         * @var ?list<WorkflowCreate>
         */
        public ?array $workflows = null,
    ) {
    }
}
