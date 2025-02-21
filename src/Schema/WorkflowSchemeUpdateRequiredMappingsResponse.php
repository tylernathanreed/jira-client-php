<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class WorkflowSchemeUpdateRequiredMappingsResponse extends Dto
{
    public function __construct(
        /**
         * The list of required status mappings by issue type.
         * 
         * @var ?list<RequiredMappingByIssueType>
         */
        public ?array $statusMappingsByIssueTypes = null,

        /**
         * The list of required status mappings by workflow.
         * 
         * @var ?list<RequiredMappingByWorkflows>
         */
        public ?array $statusMappingsByWorkflows = null,

        /**
         * The details of the statuses in the associated workflows.
         * 
         * @var ?list<StatusMetadata>
         */
        public ?array $statuses = null,

        /**
         * The statuses associated with each workflow.
         * 
         * @var ?list<StatusesPerWorkflow>
         */
        public ?array $statusesPerWorkflow = null,
    ) {
    }
}
