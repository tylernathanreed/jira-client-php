<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class PaginatedResponseComment extends Dto
{
    public function __construct(
        public ?int $maxResults = null,

        /** @var ?list<Comment> */
        public ?array $results = null,

        public ?int $startAt = null,

        public ?int $total = null,
    ) {
    }
}
