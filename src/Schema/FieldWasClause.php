<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * A clause that asserts a previous value of a field.
 * For example, `status WAS "Resolved" BY currentUser() BEFORE "2019/02/02"`.
 * See "WAS" for more information about the WAS operator.
 * 
 * @link https://confluence.atlassian.com/x/dgiiLQ#Advancedsearching-operatorsreference-WASWAS
 */
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
