<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class ArchiveIssueAsyncRequest extends Dto
{
    public function __construct(
        public ?string $jql = null,
    ) {
    }
}
