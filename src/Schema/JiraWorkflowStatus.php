<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraWorkflowStatusDoc
final readonly class JiraWorkflowStatus extends Dto
{
    public function __construct(
        /** The description of the status. */
        public ?string $description = null,

        /** The ID of the status. */
        public ?string $id = null,

        /** The name of the status. */
        public ?string $name = null,

        public ?WorkflowScope $scope = null,

        /**
         * The category of the status.
         * 
         * @var 'TODO'|'IN_PROGRESS'|'DONE'|null
         */
        public ?string $statusCategory = null,

        /** The reference of the status. */
        public ?string $statusReference = null,

        /**
         * Deprecated.
         * See the "deprecation notice" for details
         * 
         * The `statuses.usages` expand is an optional parameter that can be used when reading and updating statuses in Jira.
         * It provides additional information about the projects and issue types associated with the requested statuses.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
         * 
         * @var ?list<ProjectIssueTypes>
         */
        public ?array $usages = null,
    ) {
    }
}
