<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SearchResultsDoc
final readonly class SearchResults extends Dto
{
    public function __construct(
        /** Expand options that include additional search result details in the response. */
        public ?string $expand = null,

        /**
         * The list of issues found by the search.
         * 
         * @var ?list<IssueBean>
         */
        public ?array $issues = null,

        /** The maximum number of results that could be on the page. */
        public ?int $maxResults = null,

        /**
         * The ID and name of each field in the search results.
         * 
         * @var array<string,string>
         */
        public ?array $names = null,

        /** The schema describing the field types in the search results. */
        public ?JsonTypeBean $schema = null,

        /** The index of the first item returned on the page. */
        public ?int $startAt = null,

        /** The number of results on the page. */
        public ?int $total = null,

        /**
         * Any warnings related to the JQL query.
         * 
         * @var ?list<string>
         */
        public ?array $warningMessages = null,
    ) {
    }
}
