<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowSchemeAssociationsDoc
final readonly class WorkflowSchemeAssociations extends Dto
{
    public function __construct(
        /**
         * The list of projects that use the workflow scheme.
         * 
         * @var list<string>
         */
        public array $projectIds,

        /** The workflow scheme. */
        public WorkflowScheme $workflowScheme,
    ) {
    }
}
