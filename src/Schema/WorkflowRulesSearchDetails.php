<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of workflow transition rules. */
final readonly class WorkflowRulesSearchDetails extends Dto
{
    public function __construct(
        /**
         * List of workflow rule IDs that do not belong to the workflow or can not be found.
         * 
         * @var ?list<string>
         */
        public ?array $invalidRules = null,

        /**
         * List of valid workflow transition rules.
         * 
         * @var ?list<WorkflowTransitionRules>
         */
        public ?array $validRules = null,

        /**
         * The workflow ID.
         * 
         * @example 'a498d711-685d-428d-8c3e-bc03bb450ea7'
         */
        public ?string $workflowEntityId = null,
    ) {
    }
}
