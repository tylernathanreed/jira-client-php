<?php

namespace Jira\Client\Schema;

use Jira\Client\Attributes\MapName;
use Jira\Client\Dto;

/**
 * A paged list.
 * To access additional details append `[start-index:end-index]` to the expand request.
 * For example, `?expand=sharedUsers[10:40]` returns a list starting at item 10 and finishing at item 40.
 */
final readonly class PagedListUserDetailsApplicationUser extends Dto
{
    public function __construct(
        /** The index of the last item returned on the page. */
        #[MapName('end-index')]
        public ?int $endIndex = null,

        /**
         * The list of items.
         * 
         * @var ?list<UserDetails>
         */
        public ?array $items = null,

        /** The maximum number of results that could be on the page. */
        #[MapName('max-results')]
        public ?int $maxResults = null,

        /** The number of items on the page. */
        public ?int $size = null,

        /** The index of the first item returned on the page. */
        #[MapName('start-index')]
        public ?int $startIndex = null,
    ) {
    }
}
