<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowUsagesDoc
final readonly class WorkflowUsages extends Dto
{
    public function __construct(
        /** Workflow ID. */
        public ?string $workflowId = null,

        /** Workflow name. */
        public ?string $workflowName = null,
    ) {
    }
}
