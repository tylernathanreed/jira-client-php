<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** A list of parsed JQL queries. */
final class ParsedJqlQueries extends Dto
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
