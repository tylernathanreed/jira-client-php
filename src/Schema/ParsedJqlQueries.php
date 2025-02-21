<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ParsedJqlQueriesDoc
final readonly class ParsedJqlQueries extends Dto
{
    public function __construct(
        /**
         * A list of parsed JQL queries.
         * 
         * @var list<ParsedJqlQuery>
         */
        public array $queries,
    ) {
    }
}
