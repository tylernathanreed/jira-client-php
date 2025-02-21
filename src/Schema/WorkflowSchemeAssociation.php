<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The explicit association between issue types and a workflow in a workflow scheme. */
final readonly class WorkflowSchemeAssociation extends Dto
{
    public function __construct(
        /**
         * The issue types assigned to the workflow.
         * 
         * @var list<string>
         */
        public array $issueTypeIds,

        /** The ID of the workflow. */
        public string $workflowId,
    ) {
    }
}
