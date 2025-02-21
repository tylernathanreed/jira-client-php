<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowMetadataAndIssueTypeRestModelDoc
final readonly class WorkflowMetadataAndIssueTypeRestModel extends Dto
{
    public function __construct(
        /**
         * The list of issue type IDs for the mapping.
         * 
         * @var list<string>
         */
        public array $issueTypeIds,

        public WorkflowMetadataRestModel $workflow,
    ) {
    }
}
