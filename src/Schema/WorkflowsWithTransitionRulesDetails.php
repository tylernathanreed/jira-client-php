<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of workflows and their transition rules to delete. */
final class WorkflowsWithTransitionRulesDetails extends Dto
{
    public function __construct(
        /**
         * The list of workflows with transition rules to delete.
         * 
         * @var list<WorkflowTransitionRulesDetails>
         */
        public array $workflows,
    ) {
    }
}
