<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusProjectIssueTypeUsageDoc
final readonly class StatusProjectIssueTypeUsage extends Dto
{
    public function __construct(
        /** The issue type ID. */
        public ?string $id = null,
    ) {
    }
}
