<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowScopeDoc
final readonly class WorkflowScope extends Dto
{
    public function __construct(
        public ?ProjectId $project = null,

        /**
         * The scope of the workflow.
         * `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects.
         * 
         * @var 'PROJECT'|'GLOBAL'|null
         */
        public ?string $type = null,
    ) {
    }
}
