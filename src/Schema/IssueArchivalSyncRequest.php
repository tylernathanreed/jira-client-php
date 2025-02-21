<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueArchivalSyncRequestDoc
final readonly class IssueArchivalSyncRequest extends Dto
{
    public function __construct(
        public ?array $issueIdsOrKeys = null,
    ) {
    }
}
