<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldWasClauseDoc
final readonly class FieldWasClause extends Dto
{
    public function __construct(
        public JqlQueryField $field,

        public JqlQueryClauseOperand $operand,

        /**
         * The operator between the field and operand.
         * 
         * @var 'was'|'was in'|'was not in'|'was not'
         */
        public string $operator,

        /**
         * The list of time predicates.
         * 
         * @var list<JqlQueryClauseTimePredicate>
         */
        public array $predicates,
    ) {
    }
}
