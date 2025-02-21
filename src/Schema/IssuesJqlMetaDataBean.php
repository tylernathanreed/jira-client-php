<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The description of the page of issues loaded by the provided JQL query. */
final readonly class IssuesJqlMetaDataBean extends Dto
{
    public function __construct(
        /** The number of issues that were loaded in this evaluation. */
        public int $count,

        /** The maximum number of issues that could be loaded in this evaluation. */
        public int $maxResults,

        /** The index of the first issue. */
        public int $startAt,

        /** The total number of issues the JQL returned. */
        public int $totalCount,

        /**
         * Any warnings related to the JQL query.
         * Present only if the validation mode was set to `warn`.
         * 
         * @var ?list<string>
         */
        public ?array $validationWarnings = null,
    ) {
    }
}
