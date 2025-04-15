<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for creating a condition group in a workflow */
final readonly class ConditionGroupPayload extends Dto
{
    public function __construct(
        /**
         * The nested conditions of the condition group.
         * 
         * @var ?list<ConditionGroupPayload>
         */
        public ?array $conditionGroup = null,

        /**
         * The rules for this condition.
         * 
         * @var ?list<RulePayload>
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
