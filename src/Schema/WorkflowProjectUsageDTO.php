<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Projects using the workflow. */
final readonly class WorkflowProjectUsageDTO extends Dto
{
    public function __construct(
        public ?ProjectUsagePage $projects = null,

        /** The workflow ID. */
        public ?string $workflowId = null,
    ) {
    }
}
