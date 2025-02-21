<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A workflow transition rule. */
final readonly class ConnectWorkflowTransitionRule extends Dto
{
    public function __construct(
        public RuleConfiguration $configuration,

        /**
         * The ID of the transition rule.
         * 
         * @example '123'
         */
        public string $id,

        /**
         * The key of the rule, as defined in the Connect app descriptor.
         * 
         * @example 'WorkflowKey'
         */
        public string $key,

        public ?WorkflowTransition $transition = null,
    ) {
    }
}
