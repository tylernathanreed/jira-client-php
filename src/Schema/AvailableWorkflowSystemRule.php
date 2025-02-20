<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class AvailableWorkflowSystemRule extends Dto
{
    public function __construct(
        /** The rule description. */
        public string $description,

        /**
         * List of rules that conflict with this one.
         * 
         * @var list<string>
         */
        public array $incompatibleRuleKeys,

        /** Whether the rule can be added added to an initial transition. */
        public bool $isAvailableForInitialTransition,

        /** Whether the rule is visible. */
        public bool $isVisible,

        /** The rule name. */
        public string $name,

        /** The rule key. */
        public string $ruleKey,

        /**
         * The rule type.
         * 
         * @var 'Condition'|'Validator'|'Function'|'Screen'
         */
        public string $ruleType,
    ) {
    }
}
