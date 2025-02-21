<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A workflow scheme along with a list of projects that use it. */
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
