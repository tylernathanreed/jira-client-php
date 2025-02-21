<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The worflow scheme. */
final readonly class WorkflowSchemeUsage extends Dto
{
    public function __construct(
        /** The workflow scheme ID. */
        public ?string $id = null,
    ) {
    }
}
