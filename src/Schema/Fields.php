<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Key fields from the linked issue. */
final readonly class Fields extends Dto
{
    public function __construct(
        /** The assignee of the linked issue. */
        public ?UserDetails $assignee = null,

        /** The type of the linked issue. */
        public ?IssueTypeDetails $issueType = null,

        /** The type of the linked issue. */
        public ?IssueTypeDetails $issuetype = null,

        /** The priority of the linked issue. */
        public ?Priority $priority = null,

        /** The status of the linked issue. */
        public ?StatusDetails $status = null,

        /** The summary description of the linked issue. */
        public ?string $summary = null,

        /** The time tracking of the linked issue. */
        public ?TimeTrackingDetails $timetracking = null,
    ) {
    }
}
