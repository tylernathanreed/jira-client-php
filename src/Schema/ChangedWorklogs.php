<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of changed worklogs. */
final readonly class ChangedWorklogs extends Dto
{
    public function __construct(
        public ?bool $lastPage = null,

        /** The URL of the next list of changed worklogs. */
        public ?string $nextPage = null,

        /** The URL of this changed worklogs list. */
        public ?string $self = null,

        /** The datetime of the first worklog item in the list. */
        public ?int $since = null,

        /** The datetime of the last worklog item in the list. */
        public ?int $until = null,

        /**
         * Changed worklog list.
         * 
         * @var ?list<ChangedWorklog>
         */
        public ?array $values = null,
    ) {
    }
}
