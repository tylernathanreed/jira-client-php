<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of issue transitions. */
final readonly class Transitions extends Dto
{
    public function __construct(
        /** Expand options that include additional transitions details in the response. */
        public ?string $expand = null,

        /**
         * List of issue transitions.
         * 
         * @var ?list<IssueTransition>
         */
        public ?array $transitions = null,
    ) {
    }
}
