<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A page of changelogs. */
final readonly class PageOfChangelogs extends Dto
{
    public function __construct(
        /**
         * The list of changelogs.
         * 
         * @var ?list<Changelog>
         */
        public ?array $histories = null,

        /** The maximum number of results that could be on the page. */
        public ?int $maxResults = null,

        /** The index of the first item returned on the page. */
        public ?int $startAt = null,

        /** The number of results on the page. */
        public ?int $total = null,
    ) {
    }
}
