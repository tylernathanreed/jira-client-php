<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SimplifiedIssueTransitionDoc
final readonly class SimplifiedIssueTransition extends Dto
{
    public function __construct(
        /** The issue status change of the transition. */
        public ?IssueTransitionStatus $to = null,

        /** The unique ID of the transition. */
        public ?int $transitionId = null,

        /** The name of the transition. */
        public ?string $transitionName = null,
    ) {
    }
}
