<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTransitionStatusDoc
final readonly class IssueTransitionStatus extends Dto
{
    public function __construct(
        /** The unique ID of the status. */
        public ?int $statusId = null,

        /** The name of the status. */
        public ?string $statusName = null,
    ) {
    }
}
