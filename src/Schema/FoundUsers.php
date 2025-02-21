<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of users found in a search, including header text (Showing X of Y matching users) and total of matched users. */
final readonly class FoundUsers extends Dto
{
    public function __construct(
        /** Header text indicating the number of users in the response and the total number of users found in the search. */
        public ?string $header = null,

        /** The total number of users found in the search. */
        public ?int $total = null,

        public ?array $users = null,
    ) {
    }
}
