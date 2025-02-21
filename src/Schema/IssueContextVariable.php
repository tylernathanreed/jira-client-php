<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueContextVariableDoc
final readonly class IssueContextVariable extends Dto
{
    public function __construct(
        /** Type of custom context variable. */
        public string $type,

        /** The issue ID. */
        public ?int $id = null,

        /** The issue key. */
        public ?string $key = null,
    ) {
    }
}
