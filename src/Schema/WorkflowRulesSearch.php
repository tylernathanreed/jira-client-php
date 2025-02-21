<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowRulesSearchDoc
final readonly class WorkflowRulesSearch extends Dto
{
    public function __construct(
        /**
         * The list of workflow rule IDs.
         * 
         * @var list<string>
         */
        public array $ruleIds,

        /**
         * The workflow ID.
         * 
         * @example 'a498d711-685d-428d-8c3e-bc03bb450ea7'
         */
        public string $workflowEntityId,

        /**
         * Use expand to include additional information in the response.
         * This parameter accepts `transition` which, for each rule, returns information about the transition the rule is assigned to.
         * 
         * @example 'transition'
         */
        public ?string $expand = null,
    ) {
    }
}
