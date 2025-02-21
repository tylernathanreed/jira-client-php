<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SearchAndReconcileResultsDoc
final readonly class SearchAndReconcileResults extends Dto
{
    public function __construct(
        /**
         * The list of issues found by the search or reconsiliation.
         * 
         * @var ?list<IssueBean>
         */
        public ?array $issues = null,

        /**
         * The ID and name of each field in the search results.
         * 
         * @var array<string,string>
         */
        public ?array $names = null,

        /**
         * Continuation token to fetch the next page.
         * If this result represents the last or the only page this token will be null.
         * This token will expire in 7 days.
         */
        public ?string $nextPageToken = null,

        /** The schema describing the field types in the search results. */
        public ?JsonTypeBean $schema = null,
    ) {
    }
}
