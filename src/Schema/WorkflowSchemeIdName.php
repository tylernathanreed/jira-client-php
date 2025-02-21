<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowSchemeIdNameDoc
final readonly class WorkflowSchemeIdName extends Dto
{
    public function __construct(
        /** The ID of the workflow scheme. */
        public string $id,

        /** The name of the workflow scheme. */
        public string $name,
    ) {
    }
}
