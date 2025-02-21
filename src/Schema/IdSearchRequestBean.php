<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IdSearchRequestBeanDoc
final readonly class IdSearchRequestBean extends Dto
{
    public function __construct(
        /**
         * A "JQL" expression.
         * Order by clauses are not allowed.
         * 
         * @link https://confluence.atlassian.com/x/egORLQ
         */
        public ?string $jql = null,

        /** The maximum number of items to return per page. */
        public ?int $maxResults = 1000,

        /**
         * The continuation token to fetch the next page.
         * This token is provided by the response of this endpoint.
         */
        public ?string $nextPageToken = null,
    ) {
    }
}
