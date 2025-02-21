<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A page of items. */
final readonly class PageBean2ComponentJsonBean extends Dto
{
    public function __construct(
        /** Whether this is the last page. */
        public ?bool $isLast = null,

        /** The maximum number of items that could be returned. */
        public ?int $maxResults = null,

        /** If there is another page of results, the URL of the next page. */
        public ?string $nextPage = null,

        /** The URL of the page. */
        public ?string $self = null,

        /** The index of the first item returned. */
        public ?int $startAt = null,

        /** The number of items returned. */
        public ?int $total = null,

        /**
         * The list of items.
         * 
         * @var ?list<ComponentJsonBean>
         */
        public ?array $values = null,
    ) {
    }
}
