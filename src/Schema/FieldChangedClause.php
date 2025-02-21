<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * A clause that asserts whether a field was changed.
 * For example, `status CHANGED AFTER startOfMonth(-1M)`.See "CHANGED" for more information about the CHANGED operator.
 * 
 * @link https://confluence.atlassian.com/x/dgiiLQ#Advancedsearching-operatorsreference-CHANGEDCHANGED
 */
final readonly class FieldChangedClause extends Dto
{
    public function __construct(
        public JqlQueryField $field,

        /**
         * The operator applied to the field.
         * 
         * @var 'changed'
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
