<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A page containing dashboard details. */
final readonly class PageOfDashboards extends Dto
{
    public function __construct(
        /**
         * List of dashboards.
         * 
         * @var ?list<Dashboard>
         */
        public ?array $dashboards = null,

        /** The maximum number of results that could be on the page. */
        public ?int $maxResults = null,

        /** The URL of the next page of results, if any. */
        public ?string $next = null,

        /** The URL of the previous page of results, if any. */
        public ?string $prev = null,

        /** The index of the first item returned on the page. */
        public ?int $startAt = null,

        /** The number of results on the page. */
        public ?int $total = null,
    ) {
    }
}
