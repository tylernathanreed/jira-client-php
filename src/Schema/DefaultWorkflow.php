<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about the default workflow. */
final readonly class DefaultWorkflow extends Dto
{
    public function __construct(
        /** The name of the workflow to set as the default workflow. */
        public string $workflow,

        /**
         * Whether a draft workflow scheme is created or updated when updating an active workflow scheme.
         * The draft is updated with the new default workflow.
         * Defaults to `false`.
         */
        public ?bool $updateDraftIfNeeded = null,
    ) {
    }
}
