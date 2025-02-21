<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowSchemeReadResponseDoc
final readonly class WorkflowSchemeReadResponse extends Dto
{
    public function __construct(
        /** The ID of the workflow scheme. */
        public string $id,

        /** The name of the workflow scheme. */
        public string $name,

        public WorkflowScope $scope,

        public DocumentVersion $version,

        /**
         * Mappings from workflows to issue types.
         * 
         * @var list<WorkflowMetadataAndIssueTypeRestModel>
         */
        public array $workflowsForIssueTypes,

        public ?WorkflowMetadataRestModel $defaultWorkflow = null,

        /** The description of the workflow scheme. */
        public ?string $description = null,

        /**
         * Deprecated.
         * See the "deprecation notice" for details
         * 
         * The IDs of projects using the workflow scheme.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298
         * 
         * @var ?list<string>
         */
        public ?array $projectIdsUsingScheme = null,

        /** Indicates if there's an "asynchronous task" for this workflow scheme. */
        public ?string $taskId = null,
    ) {
    }
}
