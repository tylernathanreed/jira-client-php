<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowOperationsDoc
final readonly class WorkflowOperations extends Dto
{
    public function __construct(
        /** Whether the workflow can be deleted. */
        public bool $canDelete,

        /** Whether the workflow can be updated. */
        public bool $canEdit,
    ) {
    }
}
