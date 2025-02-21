<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowIdDoc
final readonly class WorkflowId extends Dto
{
    public function __construct(
        /** Whether the workflow is in the draft state. */
        public bool $draft,

        /** The name of the workflow. */
        public string $name,
    ) {
    }
}
