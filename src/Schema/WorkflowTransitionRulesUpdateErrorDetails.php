<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of any errors encountered while updating workflow transition rules for a workflow. */
final readonly class WorkflowTransitionRulesUpdateErrorDetails extends Dto
{
    public function __construct(
        /**
         * A list of transition rule update errors, indexed by the transition rule ID.
         * Any transition rule that appears here wasn't updated.
         * 
         * @var array<string,list<string>>
         */
        public array $ruleUpdateErrors,

        /**
         * The list of errors that specify why the workflow update failed.
         * The workflow was not updated if the list contains any entries.
         * 
         * @var list<string>
         */
        public array $updateErrors,

        public WorkflowId $workflowId,
    ) {
    }
}
