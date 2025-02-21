<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// FieldChangedClauseDoc
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
