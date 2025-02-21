<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldValueClauseDoc
final readonly class FieldValueClause extends Dto
{
    public function __construct(
        public JqlQueryField $field,

        public JqlQueryClauseOperand $operand,

        /**
         * The operator between the field and operand.
         * 
         * @var '='|'!='|'>'|'<'|'>='|'<='|'in'|'not in'|'~'|'~='|'is'|'is not'
         */
        public string $operator,
    ) {
    }
}
