<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The request payload to get the required mappings for updating a workflow scheme. */
final readonly class WorkflowSchemeUpdateRequiredMappingsRequest extends Dto
{
    public function __construct(
        /** The ID of the workflow scheme. */
        public string $id,

        /**
         * The new workflow to issue type mappings for this workflow scheme.
         * 
         * @var list<WorkflowSchemeAssociation>
         */
        public array $workflowsForIssueTypes,

        /**
         * The ID of the new default workflow for this workflow scheme.
         * Only used in global-scoped workflow schemes.
         * If it isn't specified, is set to *Jira Workflow (jira)*.
         */
        public ?string $defaultWorkflowId = null,
    ) {
    }
}
