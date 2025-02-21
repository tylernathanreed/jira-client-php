<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class ArchiveIssueAsyncRequest extends Dto
{
    public function __construct(
        public ?string $jql = null,
    ) {
    }
}
