<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// MappingsByWorkflowDoc
final readonly class MappingsByWorkflow extends Dto
{
    public function __construct(
        /** The ID of the new workflow. */
        public string $newWorkflowId,

        /** The ID of the old workflow. */
        public string $oldWorkflowId,

        /**
         * The list of status mappings.
         * 
         * @var list<WorkflowAssociationStatusMapping>
         */
        public array $statusMappings,
    ) {
    }
}
