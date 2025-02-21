<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// AvailableWorkflowConnectRuleDoc
final readonly class AvailableWorkflowConnectRule extends Dto
{
    public function __construct(
        /** The add-on providing the rule. */
        public ?string $addonKey = null,

        /** The URL creation path segment defined in the Connect module. */
        public ?string $createUrl = null,

        /** The rule description. */
        public ?string $description = null,

        /** The URL edit path segment defined in the Connect module. */
        public ?string $editUrl = null,

        /** The module providing the rule. */
        public ?string $moduleKey = null,

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

        /** The URL view path segment defined in the Connect module. */
        public ?string $viewUrl = null,
    ) {
    }
}
