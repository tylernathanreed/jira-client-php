<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowSchemeUsageDTODoc
final readonly class WorkflowSchemeUsageDTO extends Dto
{
    public function __construct(
        /** The workflow ID. */
        public ?string $workflowId = null,

        public ?WorkflowSchemeUsagePage $workflowSchemes = null,
    ) {
    }
}
