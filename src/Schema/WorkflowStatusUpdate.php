<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowStatusUpdateDoc
final readonly class WorkflowStatusUpdate extends Dto
{
    public function __construct(
        /** The name of the status. */
        public string $name,

        /**
         * The category of the status.
         * 
         * @var 'TODO'|'IN_PROGRESS'|'DONE'
         */
        public string $statusCategory,

        /** The reference of the status. */
        public string $statusReference,

        /** The description of the status. */
        public ?string $description = null,

        /** The ID of the status. */
        public ?string $id = null,
    ) {
    }
}
