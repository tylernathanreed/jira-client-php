<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * Overrides, for the selected issue types, any status mappings provided in `statusMappingsByWorkflows`.
 * Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has.
 * Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`.
 */
final readonly class MappingsByIssueTypeOverride extends Dto
{
    public function __construct(
        /** The ID of the issue type for this mapping. */
        public string $issueTypeId,

        /**
         * The list of status mappings.
         * 
         * @var list<WorkflowAssociationStatusMapping>
         */
        public array $statusMappings,
    ) {
    }
}
