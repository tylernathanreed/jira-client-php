<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of any errors encountered while updating workflow transition rules. */
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
