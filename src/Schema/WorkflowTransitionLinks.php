<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowTransitionLinksDoc
final readonly class WorkflowTransitionLinks extends Dto
{
    public function __construct(
        /** The port that the transition starts from. */
        public ?int $fromPort = null,

        /** The status that the transition starts from. */
        public ?string $fromStatusReference = null,

        /** The port that the transition goes to. */
        public ?int $toPort = null,
    ) {
    }
}
