<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowSchemeUpdateRequestDoc
final readonly class WorkflowSchemeUpdateRequest extends Dto
{
    public function __construct(
        /** The new description for this workflow scheme. */
        public string $description,

        /** The ID of this workflow scheme. */
        public string $id,

        /** The new name for this workflow scheme. */
        public string $name,

        public DocumentVersion $version,

        /**
         * The ID of the workflow for issue types without having a mapping defined in this workflow scheme.
         * Only used in global-scoped workflow schemes.
         * If the `defaultWorkflowId` isn't specified, this is set to *Jira Workflow (jira)*.
         */
        public ?string $defaultWorkflowId = null,

        /**
         * Overrides, for the selected issue types, any status mappings provided in `statusMappingsByWorkflows`.
         * Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has.
         * Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`.
         * 
         * @var ?list<MappingsByIssueTypeOverride>
         */
        public ?array $statusMappingsByIssueTypeOverride = null,

        /**
         * The status mappings by workflows.
         * Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has.
         * Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`.
         * 
         * @var ?list<MappingsByWorkflow>
         */
        public ?array $statusMappingsByWorkflows = null,

        /**
         * Mappings from workflows to issue types.
         * 
         * @var ?list<WorkflowSchemeAssociation>
         */
        public ?array $workflowsForIssueTypes = null,
    ) {
    }
}
