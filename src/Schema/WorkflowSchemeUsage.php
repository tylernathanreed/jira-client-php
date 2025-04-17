<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The worflow scheme. */
final class WorkflowSchemeUsage extends Dto
{
    public function __construct(
        /** The workflow scheme ID. */
        public ?string $id = null,
    ) {
    }
}
