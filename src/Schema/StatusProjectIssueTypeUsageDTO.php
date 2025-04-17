<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The issue types using this status in a project. */
final class StatusProjectIssueTypeUsageDTO extends Dto
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
