<?php

namespace Jira\Client\Schema;

use Jira\Client\Attributes\MapName;
use Jira\Client\Dto;

/** A paginated list of subscriptions to a filter. */
final readonly class FilterSubscriptionsList extends Dto
{
    public function __construct(
        /** The index of the last item returned on the page. */
        #[MapName('end-index')]
        public ?int $endIndex = null,

        /**
         * The list of items.
         * 
         * @var ?list<FilterSubscription>
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
