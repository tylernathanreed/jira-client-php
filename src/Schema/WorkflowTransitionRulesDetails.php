<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a workflow configuration update request. */
final readonly class WorkflowTransitionRulesDetails extends Dto
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
