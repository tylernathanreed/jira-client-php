<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class ArchiveIssueAsyncRequest extends Dto
{
    public function __construct(
        public ?string $jql = null,
    ) {
    }
}
