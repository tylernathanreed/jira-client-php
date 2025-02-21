<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowReadRequestDoc
final readonly class WorkflowReadRequest extends Dto
{
    public function __construct(
        /**
         * The list of projects and issue types to query.
         * 
         * @var ?list<ProjectAndIssueTypePair>
         */
        public ?array $projectAndIssueTypes = null,

        /**
         * The list of workflow IDs to query.
         * 
         * @var ?list<string>
         */
        public ?array $workflowIds = null,

        /**
         * The list of workflow names to query.
         * 
         * @var ?list<string>
         */
        public ?array $workflowNames = null,
    ) {
    }
}
