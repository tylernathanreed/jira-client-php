<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypesWorkflowMappingDoc
final readonly class IssueTypesWorkflowMapping extends Dto
{
    public function __construct(
        /** Whether the workflow is the default workflow for the workflow scheme. */
        public ?bool $defaultMapping = null,

        /**
         * The list of issue type IDs.
         * 
         * @var ?list<string>
         */
        public ?array $issueTypes = null,

        /**
         * Whether a draft workflow scheme is created or updated when updating an active workflow scheme.
         * The draft is updated with the new workflow-issue types mapping.
         * Defaults to `false`.
         */
        public ?bool $updateDraftIfNeeded = null,

        /**
         * The name of the workflow.
         * Optional if updating the workflow-issue types mapping.
         */
        public ?string $workflow = null,
    ) {
    }
}
