<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Attributes\PolymorphicList;
use Jira\Client\Http\Dto;

/**
 * A compound workflow transition rule condition.
 * This object returns `nodeType` as `compound`.
 */
final class WorkflowCompoundCondition extends Dto
{
    public function __construct(
        /**
         * The list of workflow conditions.
         * 
         * @var list<WorkflowCompoundCondition|WorkflowSimpleCondition>
         */
        #[PolymorphicList(WorkflowCondition::class)]
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
