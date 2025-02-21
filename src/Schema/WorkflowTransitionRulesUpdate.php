<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a workflow configuration update request. */
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
