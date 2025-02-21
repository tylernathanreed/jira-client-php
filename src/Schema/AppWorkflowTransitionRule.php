<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A workflow transition rule. */
final readonly class AppWorkflowTransitionRule extends Dto
{
    public function __construct(
        public RuleConfiguration $configuration,

        /** The ID of the transition rule. */
        public string $id,

        /** The key of the rule, as defined in the Connect or the Forge app descriptor. */
        public string $key,

        public ?WorkflowTransition $transition = null,
    ) {
    }
}
