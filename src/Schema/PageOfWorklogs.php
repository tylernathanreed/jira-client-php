<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Paginated list of worklog details */
final readonly class PageOfWorklogs extends Dto
{
    public function __construct(
        /** The maximum number of results that could be on the page. */
        public ?int $maxResults = null,

        /** The index of the first item returned on the page. */
        public ?int $startAt = null,

        /** The number of results on the page. */
        public ?int $total = null,

        /**
         * List of worklogs.
         * 
         * @var ?list<Worklog>
         */
        public ?array $worklogs = null,
    ) {
    }
}
