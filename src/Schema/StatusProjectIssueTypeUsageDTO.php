<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The issue types using this status in a project. */
final readonly class StatusProjectIssueTypeUsageDTO extends Dto
{
    public function __construct(
        public ?StatusProjectIssueTypeUsagePage $issueTypes = null,

        /** The project ID. */
        public ?string $projectId = null,

        /** The status ID. */
        public ?string $statusId = null,
    ) {
    }
}
