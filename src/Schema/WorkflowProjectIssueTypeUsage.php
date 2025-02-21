<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowProjectIssueTypeUsageDoc
final readonly class WorkflowProjectIssueTypeUsage extends Dto
{
    public function __construct(
        /** The ID of the issue type. */
        public ?string $id = null,
    ) {
    }
}
