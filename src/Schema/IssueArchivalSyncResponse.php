<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueArchivalSyncResponseDoc
final readonly class IssueArchivalSyncResponse extends Dto
{
    public function __construct(
        public ?Errors $errors = null,

        public ?int $numberOfIssuesUpdated = null,
    ) {
    }
}
