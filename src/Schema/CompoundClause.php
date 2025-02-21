<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CompoundClauseDoc
final readonly class CompoundClause extends Dto
{
    public function __construct(
        /**
         * The list of nested clauses.
         * 
         * @var list<JqlQueryClause>
         */
        public array $clauses,

        /**
         * The operator between the clauses.
         * 
         * @var 'and'|'or'|'not'
         */
        public string $operator,
    ) {
    }
}
