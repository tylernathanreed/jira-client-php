<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ConditionGroupConfigurationDoc
final readonly class ConditionGroupConfiguration extends Dto
{
    public function __construct(
        /**
         * The nested conditions of the condition group.
         * 
         * @var ?list<ConditionGroupConfiguration>
         */
        public ?array $conditionGroups = null,

        /**
         * The rules for this condition.
         * 
         * @var ?list<WorkflowRuleConfiguration>
         */
        public ?array $conditions = null,

        /**
         * Determines how the conditions in the group are evaluated.
         * Accepts either `ANY` or `ALL`.
         * If `ANY` is used, at least one condition in the group must be true for the group to evaluate to true.
         * If `ALL` is used, all conditions in the group must be true for the group to evaluate to true.
         * 
         * @var 'ANY'|'ALL'|null
         */
        public ?string $operation = null,
    ) {
    }
}
