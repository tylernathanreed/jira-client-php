<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeWorkflowMappingDoc
final readonly class IssueTypeWorkflowMapping extends Dto
{
    public function __construct(
        /**
         * The ID of the issue type.
         * Not required if updating the issue type-workflow mapping.
         */
        public ?string $issueType = null,

        /**
         * Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited.
         * Defaults to `false`.
         * Only applicable when updating the workflow-issue types mapping.
         */
        public ?bool $updateDraftIfNeeded = null,

        /** The name of the workflow. */
        public ?string $workflow = null,
    ) {
    }
}
