<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Properties that identify a workflow. */
final class WorkflowId extends Dto
{
    public function __construct(
        /** Whether the workflow is in the draft state. */
        public bool $draft,

        /** The name of the workflow. */
        public string $name,
    ) {
    }
}
