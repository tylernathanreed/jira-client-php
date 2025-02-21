<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a workflow status. */
final readonly class WorkflowStatus extends Dto
{
    public function __construct(
        /** The ID of the issue status. */
        public string $id,

        /** The name of the status in the workflow. */
        public string $name,

        /**
         * Additional properties that modify the behavior of issues in this status.
         * Supports the properties `jira.issue.editable` and `issueEditable` (deprecated) that indicate whether issues are editable.
         */
        public ?object $properties = null,
    ) {
    }
}
