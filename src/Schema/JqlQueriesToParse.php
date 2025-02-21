<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of JQL queries to parse. */
final readonly class JqlQueriesToParse extends Dto
{
    public function __construct(
        /**
         * A list of queries to parse.
         * 
         * @var list<string>
         */
        public array $queries,
    ) {
    }
}
