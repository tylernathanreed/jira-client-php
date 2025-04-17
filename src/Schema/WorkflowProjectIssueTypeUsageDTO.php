<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Issue types associated with the workflow for a project. */
final class WorkflowProjectIssueTypeUsageDTO extends Dto
{
    public function __construct(
        public ?WorkflowProjectIssueTypeUsagePage $issueTypes = null,

        /** The ID of the project. */
        public ?string $projectId = null,

        /** The ID of the workflow. */
        public ?string $workflowId = null,
    ) {
    }
}
