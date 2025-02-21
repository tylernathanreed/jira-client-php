<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Projects using the workflow scheme. */
final readonly class WorkflowSchemeProjectUsageDTO extends Dto
{
    public function __construct(
        public ?ProjectUsagePage $projects = null,

        /** The workflow scheme ID. */
        public ?string $workflowSchemeId = null,
    ) {
    }
}
