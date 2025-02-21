<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowIDsDoc
final readonly class WorkflowIDs extends Dto
{
    public function __construct(
        /** The name of the workflow. */
        public string $name,

        /** The entity ID of the workflow. */
        public ?string $entityId = null,
    ) {
    }
}
