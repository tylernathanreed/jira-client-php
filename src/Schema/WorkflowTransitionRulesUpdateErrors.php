<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowTransitionRulesUpdateErrorsDoc
final readonly class WorkflowTransitionRulesUpdateErrors extends Dto
{
    public function __construct(
        /**
         * A list of workflows.
         * 
         * @var list<WorkflowTransitionRulesUpdateErrorDetails>
         */
        public array $updateResults,
    ) {
    }
}
