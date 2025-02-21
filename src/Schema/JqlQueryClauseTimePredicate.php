<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlQueryClauseTimePredicateDoc
final readonly class JqlQueryClauseTimePredicate extends Dto
{
    public function __construct(
        public JqlQueryClauseOperand $operand,

        /**
         * The operator between the field and the operand.
         * 
         * @var 'before'|'after'|'from'|'to'|'on'|'during'|'by'
         */
        public string $operator,
    ) {
    }
}
