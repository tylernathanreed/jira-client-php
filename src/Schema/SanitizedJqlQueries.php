<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SanitizedJqlQueriesDoc
final readonly class SanitizedJqlQueries extends Dto
{
    public function __construct(
        /**
         * The list of sanitized JQL queries.
         * 
         * @var ?list<SanitizedJqlQuery>
         */
        public ?array $queries = null,
    ) {
    }
}
