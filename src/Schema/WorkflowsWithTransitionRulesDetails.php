<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowsWithTransitionRulesDetailsDoc
final readonly class WorkflowsWithTransitionRulesDetails extends Dto
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
