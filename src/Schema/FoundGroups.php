<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of groups found in a search, including header text (Showing X of Y matching groups) and total of matched groups. */
final readonly class FoundGroups extends Dto
{
    public function __construct(
        /** @var ?list<FoundGroup> */
        public ?array $groups = null,

        /** Header text indicating the number of groups in the response and the total number of groups found in the search. */
        public ?string $header = null,

        /** The total number of groups found in the search. */
        public ?int $total = null,
    ) {
    }
}
