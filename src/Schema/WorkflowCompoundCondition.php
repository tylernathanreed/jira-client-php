<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowCompoundConditionDoc
final readonly class WorkflowCompoundCondition extends Dto
{
    public function __construct(
        /**
         * The list of workflow conditions.
         * 
         * @var list<WorkflowCondition>
         */
        public array $conditions,

        public string $nodeType,

        /**
         * The compound condition operator.
         * 
         * @var 'AND'|'OR'
         */
        public string $operator,
    ) {
    }
}
