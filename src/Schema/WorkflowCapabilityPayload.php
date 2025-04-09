<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/**
 * The payload for creating a workflows.
 * See https://www.atlassian.com/software/jira/guides/workflows/overview\#what-is-a-jira-workflow
 */
final readonly class WorkflowCapabilityPayload extends Dto
{
    public function __construct(
        /**
         * The statuses for the workflow
         * 
         * @var ?list<StatusPayload>
         */
        public ?array $statuses = null,

        public ?WorkflowSchemePayload $workflowScheme = null,

        /**
         * The transitions for the workflow
         * 
         * @var ?list<WorkflowPayload>
         */
        public ?array $workflows = null,
    ) {
    }
}
