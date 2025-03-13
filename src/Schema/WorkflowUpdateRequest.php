<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The update workflows payload. */
final readonly class WorkflowUpdateRequest extends Dto
{
    public function __construct(
        /**
         * The statuses to associate with the workflows.
         * 
         * @var ?list<WorkflowStatusUpdate>
         */
        public ?array $statuses = null,

        /**
         * The details of the workflows to update.
         * 
         * @var ?list<WorkflowUpdate>
         */
        public ?array $workflows = null,
    ) {
    }
}
