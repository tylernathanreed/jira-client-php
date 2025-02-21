<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowProjectUsageDTODoc
final readonly class WorkflowProjectUsageDTO extends Dto
{
    public function __construct(
        public ?ProjectUsagePage $projects = null,

        /** The workflow ID. */
        public ?string $workflowId = null,
    ) {
    }
}
