<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * Deprecated.
 * See the "deprecation notice" for details
 * 
 * The workflows that use this status.
 * Only available if the `workflowUsages` expand is requested.
 * 
 * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
 */
final readonly class WorkflowUsages extends Dto
{
    public function __construct(
        /** Workflow ID. */
        public ?string $workflowId = null,

        /** Workflow name. */
        public ?string $workflowName = null,
    ) {
    }
}
