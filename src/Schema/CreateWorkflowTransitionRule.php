<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreateWorkflowTransitionRuleDoc
final readonly class CreateWorkflowTransitionRule extends Dto
{
    public function __construct(
        /** The type of the transition rule. */
        public string $type,

        /**
         * EXPERIMENTAL.
         * The configuration of the transition rule.
         */
        public ?object $configuration = null,
    ) {
    }
}
