<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraWorkflowDoc
final readonly class JiraWorkflow extends Dto
{
    public function __construct(
        /** The creation date of the workflow. */
        public ?string $created = null,

        /** The description of the workflow. */
        public ?string $description = null,

        /** The ID of the workflow. */
        public ?string $id = null,

        /** Indicates if the workflow can be edited. */
        public ?bool $isEditable = null,

        /** The name of the workflow. */
        public ?string $name = null,

        public ?WorkflowScope $scope = null,

        public ?WorkflowLayout $startPointLayout = null,

        /**
         * The statuses referenced in this workflow.
         * 
         * @var ?list<WorkflowReferenceStatus>
         */
        public ?array $statuses = null,

        /** If there is a current "asynchronous task" operation for this workflow. */
        public ?string $taskId = null,

        /**
         * The transitions of the workflow.
         * Note that a transition can have either the deprecated `to`/`from` fields or the `toStatusReference`/`links` fields, but never both nor a combination.
         * 
         * @var ?list<WorkflowTransitions>
         */
        public ?array $transitions = null,

        /** The last edited date of the workflow. */
        public ?string $updated = null,

        /**
         * Deprecated.
         * See the "deprecation notice" for details
         * 
         * Use the optional `workflows.usages` expand to get additional information about the projects and issue types associated with the requested workflows.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
         * 
         * @var ?list<ProjectIssueTypes>
         */
        public ?array $usages = null,

        public ?DocumentVersion $version = null,
    ) {
    }
}
