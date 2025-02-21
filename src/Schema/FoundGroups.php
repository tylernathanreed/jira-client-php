<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FoundGroupsDoc
final readonly class FoundGroups extends Dto
{
    public function __construct(
        public ?array $groups = null,

        /** Header text indicating the number of groups in the response and the total number of groups found in the search. */
        public ?string $header = null,

        /** The total number of groups found in the search. */
        public ?int $total = null,
    ) {
    }
}
