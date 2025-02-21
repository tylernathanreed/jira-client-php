<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The trigger rules available. */
final readonly class AvailableWorkflowTriggers extends Dto
{
    public function __construct(
        /**
         * The list of available trigger types.
         * 
         * @var list<AvailableWorkflowTriggerTypes>
         */
        public array $availableTypes,

        /** The rule key of the rule. */
        public string $ruleKey,
    ) {
    }
}
