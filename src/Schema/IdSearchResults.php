<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IdSearchResultsDoc
final readonly class IdSearchResults extends Dto
{
    public function __construct(
        /**
         * The list of issue IDs found by the search.
         * 
         * @var ?list<int>
         */
        public ?array $issueIds = null,

        /**
         * Continuation token to fetch the next page.
         * If this result represents the last or the only page this token will be null.
         */
        public ?string $nextPageToken = null,
    ) {
    }
}
