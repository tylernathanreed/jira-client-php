<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a status. */
final readonly class JiraStatus extends Dto
{
    public function __construct(
        /** The description of the status. */
        public ?string $description = null,

        /** The ID of the status. */
        public ?string $id = null,

        /** The name of the status. */
        public ?string $name = null,

        public ?StatusScope $scope = null,

        /**
         * The category of the status.
         * 
         * @var 'TODO'|'IN_PROGRESS'|'DONE'|null
         */
        public ?string $statusCategory = null,

        /**
         * Deprecated.
         * See the "deprecation notice" for details
         * 
         * Projects and issue types where the status is used.
         * Only available if the `usages` expand is requested.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
         * 
         * @var ?list<ProjectIssueTypes>
         */
        public ?array $usages = null,

        /**
         * Deprecated.
         * See the "deprecation notice" for details
         * 
         * The workflows that use this status.
         * Only available if the `workflowUsages` expand is requested.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
         * 
         * @var ?list<WorkflowUsages>
         */
        public ?array $workflowUsages = null,
    ) {
    }
}
