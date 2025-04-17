<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details about a workflow configuration update request. */
final class WorkflowTransitionRulesDetails extends Dto
{
    public function __construct(
        public WorkflowId $workflowId,

        /**
         * The list of connect workflow rule IDs.
         * 
         * @var list<string>
         */
        public array $workflowRuleIds,
    ) {
    }
}
