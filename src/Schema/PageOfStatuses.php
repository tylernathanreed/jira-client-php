<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PageOfStatusesDoc
final readonly class PageOfStatuses extends Dto
{
    public function __construct(
        /** Whether this is the last page. */
        public ?bool $isLast = null,

        /** The maximum number of items that could be returned. */
        public ?int $maxResults = null,

        /** The URL of the next page of results, if any. */
        public ?string $nextPage = null,

        /** The URL of this page. */
        public ?string $self = null,

        /** The index of the first item returned on the page. */
        public ?int $startAt = null,

        /** Number of items that satisfy the search. */
        public ?int $total = null,

        /**
         * The list of items.
         * 
         * @var ?list<JiraStatus>
         */
        public ?array $values = null,
    ) {
    }
}
