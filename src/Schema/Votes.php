<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// VotesDoc
final readonly class Votes extends Dto
{
    public function __construct(
        /** Whether the user making this request has voted on the issue. */
        public ?bool $hasVoted = null,

        /** The URL of these issue vote details. */
        public ?string $self = null,

        /**
         * List of the users who have voted on this issue.
         * An empty list is returned when the calling user doesn't have the *View voters and watchers* project permission.
         * 
         * @var ?list<User>
         */
        public ?array $voters = null,

        /** The number of votes on the issue. */
        public ?int $votes = null,
    ) {
    }
}
