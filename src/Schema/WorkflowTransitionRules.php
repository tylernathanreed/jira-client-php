<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A workflow with transition rules. */
final readonly class WorkflowTransitionRules extends Dto
{
    public function __construct(
        public WorkflowId $workflowId,

        /**
         * The list of conditions within the workflow.
         * 
         * @var ?list<AppWorkflowTransitionRule>
         */
        public ?array $conditions = null,

        /**
         * The list of post functions within the workflow.
         * 
         * @var ?list<AppWorkflowTransitionRule>
         */
        public ?array $postFunctions = null,

        /**
         * The list of validators within the workflow.
         * 
         * @var ?list<AppWorkflowTransitionRule>
         */
        public ?array $validators = null,
    ) {
    }
}
