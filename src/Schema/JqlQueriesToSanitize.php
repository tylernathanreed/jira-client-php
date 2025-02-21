<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlQueriesToSanitizeDoc
final readonly class JqlQueriesToSanitize extends Dto
{
    public function __construct(
        /**
         * The list of JQL queries to sanitize.
         * Must contain unique values.
         * Maximum of 20 queries.
         * 
         * @var list<JqlQueryToSanitize>
         */
        public array $queries,
    ) {
    }
}
