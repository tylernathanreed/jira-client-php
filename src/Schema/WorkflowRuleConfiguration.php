<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The configuration of the rule. */
final readonly class WorkflowRuleConfiguration extends Dto
{
    public function __construct(
        /** The rule key of the rule. */
        public string $ruleKey,

        /** The ID of the rule. */
        public ?string $id = null,

        /**
         * The parameters related to the rule.
         * 
         * @var array<string,string>
         */
        public ?array $parameters = null,
    ) {
    }
}
