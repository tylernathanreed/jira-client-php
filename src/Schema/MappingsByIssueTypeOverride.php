<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// MappingsByIssueTypeOverrideDoc
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
