<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ArchiveIssueAsyncRequestDoc
final readonly class ArchiveIssueAsyncRequest extends Dto
{
    public function __construct(
        public ?string $jql = null,
    ) {
    }
}
