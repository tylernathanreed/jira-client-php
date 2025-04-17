<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Projects using the workflow scheme. */
final class WorkflowSchemeProjectUsageDTO extends Dto
{
    public function __construct(
        public ?ProjectUsagePage $projects = null,

        /** The workflow scheme ID. */
        public ?string $workflowSchemeId = null,
    ) {
    }
}
