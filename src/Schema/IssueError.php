<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueErrorDoc
final readonly class IssueError extends Dto
{
    public function __construct(
        /** The error that occurred when fetching this issue. */
        public ?string $errorMessage = null,

        /** The ID of the issue. */
        public ?string $id = null,
    ) {
    }
}
