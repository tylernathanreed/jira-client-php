<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowTransitionRulesUpdateDoc
final readonly class WorkflowTransitionRulesUpdate extends Dto
{
    public function __construct(
        /**
         * The list of workflows with transition rules to update.
         * 
         * @var list<WorkflowTransitionRules>
         */
        public array $workflows,
    ) {
    }
}
