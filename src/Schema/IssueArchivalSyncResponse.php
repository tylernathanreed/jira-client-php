<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Number of archived/unarchived issues and list of errors that occurred during the action, if any. */
final readonly class IssueArchivalSyncResponse extends Dto
{
    public function __construct(
        public ?Errors $errors = null,

        public ?int $numberOfIssuesUpdated = null,
    ) {
    }
}
