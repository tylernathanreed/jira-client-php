<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a parsed JQL query. */
final readonly class ParsedJqlQuery extends Dto
{
    public function __construct(
        /** The JQL query that was parsed and validated. */
        public string $query,

        /**
         * The list of syntax or validation errors.
         * 
         * @var ?list<string>
         */
        public ?array $errors = null,

        /**
         * The syntax tree of the query.
         * Empty if the query was invalid.
         */
        public ?JqlQuery $structure = null,
    ) {
    }
}
