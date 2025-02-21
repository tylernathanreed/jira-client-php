<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of parsed JQL queries. */
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
