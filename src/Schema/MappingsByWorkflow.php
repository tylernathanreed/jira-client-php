<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * The status mappings by workflows.
 * Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has.
 * Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`.
 */
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
