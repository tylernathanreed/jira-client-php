<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The details of the workflows to create. */
final readonly class WorkflowCreate extends Dto
{
    public function __construct(
        /** The name of the workflow to create. */
        public string $name,

        /**
         * The statuses associated with this workflow.
         * 
         * @var list<StatusLayoutUpdate>
         */
        public array $statuses,

        /**
         * The transitions of this workflow.
         * 
         * @var list<TransitionUpdateDTO>
         */
        public array $transitions,

        /** The description of the workflow to create. */
        public ?string $description = null,

        public ?WorkflowLayout $startPointLayout = null,
    ) {
    }
}
