<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowTriggerDoc
final readonly class WorkflowTrigger extends Dto
{
    public function __construct(
        /**
         * The parameters of the trigger.
         * 
         * @var array<string,string>
         */
        public array $parameters,

        /** The rule key of the trigger. */
        public string $ruleKey,

        /** The ID of the trigger. */
        public ?string $id = null,
    ) {
    }
}
