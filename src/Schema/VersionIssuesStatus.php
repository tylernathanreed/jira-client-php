<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Counts of the number of issues in various statuses. */
final readonly class VersionIssuesStatus extends Dto
{
    public function __construct(
        /** Count of issues with status *done*. */
        public ?int $done = null,

        /** Count of issues with status *in progress*. */
        public ?int $inProgress = null,

        /** Count of issues with status *to do*. */
        public ?int $toDo = null,

        /** Count of issues with a status other than *to do*, *in progress*, and *done*. */
        public ?int $unmapped = null,
    ) {
    }
}
