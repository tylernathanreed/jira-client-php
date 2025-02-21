<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowUpdateDoc
final readonly class WorkflowUpdate extends Dto
{
    public function __construct(
        /** The ID of this workflow. */
        public string $id,

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

        public DocumentVersion $version,

        /**
         * The mapping of old to new status ID.
         * 
         * @var ?list<StatusMigration>
         */
        public ?array $defaultStatusMappings = null,

        /** The new description for this workflow. */
        public ?string $description = null,

        public ?WorkflowLayout $startPointLayout = null,

        /**
         * The mapping of old to new status ID for a specific project and issue type.
         * 
         * @var ?list<StatusMappingDTO>
         */
        public ?array $statusMappings = null,
    ) {
    }
}
