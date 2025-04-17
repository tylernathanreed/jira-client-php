<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * The payload for creating a workflow scheme.
 * See https://www.atlassian.com/software/jira/guides/workflows/overview\#what-is-a-jira-workflow-scheme
 */
final class WorkflowSchemePayload extends Dto
{
    public function __construct(
        public ?ProjectCreateResourceIdentifier $defaultWorkflow = null,

        /** The description of the workflow scheme */
        public ?string $description = null,

        /**
         * Association between issuetypes and workflows
         * 
         * @var array<string,ProjectCreateResourceIdentifier>
         */
        public ?array $explicitMappings = null,

        /** The name of the workflow scheme */
        public ?string $name = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,
    ) {
    }
}
