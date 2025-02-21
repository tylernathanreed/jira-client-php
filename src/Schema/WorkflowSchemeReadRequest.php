<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowSchemeReadRequestDoc
final readonly class WorkflowSchemeReadRequest extends Dto
{
    public function __construct(
        /**
         * The list of project IDs to query.
         * 
         * @var ?list<string>
         */
        public ?array $projectIds = null,

        /**
         * The list of workflow scheme IDs to query.
         * 
         * @var ?list<string>
         */
        public ?array $workflowSchemeIds = null,
    ) {
    }
}
