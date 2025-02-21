<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The ID and the name of the workflow scheme. */
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
