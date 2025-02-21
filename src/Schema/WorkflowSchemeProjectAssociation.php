<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** An associated workflow scheme and project. */
final readonly class WorkflowSchemeProjectAssociation extends Dto
{
    public function __construct(
        /** The ID of the project. */
        public string $projectId,

        /**
         * The ID of the workflow scheme.
         * If the workflow scheme ID is `null`, the operation assigns the default workflow scheme.
         */
        public ?string $workflowSchemeId = null,
    ) {
    }
}
