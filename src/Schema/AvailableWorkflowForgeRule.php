<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// AvailableWorkflowForgeRuleDoc
final readonly class AvailableWorkflowForgeRule extends Dto
{
    public function __construct(
        /** The rule description. */
        public ?string $description = null,

        /** The unique ARI of the forge rule type. */
        public ?string $id = null,

        /** The rule name. */
        public ?string $name = null,

        /** The rule key. */
        public ?string $ruleKey = null,

        /**
         * The rule type.
         * 
         * @var 'Condition'|'Validator'|'Function'|'Screen'|null
         */
        public ?string $ruleType = null,
    ) {
    }
}
