<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowSchemeDoc
final readonly class WorkflowScheme extends Dto
{
    public function __construct(
        /**
         * The name of the default workflow for the workflow scheme.
         * The default workflow has *All Unassigned Issue Types* assigned to it in Jira.
         * If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*.
         */
        public ?string $defaultWorkflow = null,

        /** The description of the workflow scheme. */
        public ?string $description = null,

        /** Whether the workflow scheme is a draft or not. */
        public ?bool $draft = null,

        /** The ID of the workflow scheme. */
        public ?int $id = null,

        /**
         * The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair.
         * Note that an issue type can only be mapped to one workflow in a workflow scheme.
         * 
         * @var array<string,string>
         */
        public ?array $issueTypeMappings = null,

        /** The issue types available in Jira. */
        public ?IssueTypeDetails $issueTypes = null,

        /**
         * The date-time that the draft workflow scheme was last modified.
         * A modification is a change to the issue type-project mappings only.
         * This property does not apply to non-draft workflows.
         */
        public ?string $lastModified = null,

        /**
         * The user that last modified the draft workflow scheme.
         * A modification is a change to the issue type-project mappings only.
         * This property does not apply to non-draft workflows.
         */
        public ?User $lastModifiedUser = null,

        /**
         * The name of the workflow scheme.
         * The name must be unique.
         * The maximum length is 255 characters.
         * Required when creating a workflow scheme.
         */
        public ?string $name = null,

        /**
         * For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme.
         * The default workflow has *All Unassigned Issue Types* assigned to it in Jira.
         */
        public ?string $originalDefaultWorkflow = null,

        /**
         * For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair.
         * Note that an issue type can only be mapped to one workflow in a workflow scheme.
         * 
         * @var array<string,string>
         */
        public ?array $originalIssueTypeMappings = null,

        public ?string $self = null,

        /**
         * Whether to create or update a draft workflow scheme when updating an active workflow scheme.
         * An active workflow scheme is a workflow scheme that is used by at least one project.
         * The following examples show how this property works:
         * 
         *  - Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated.
         * Otherwise, a draft workflow scheme is created
         *  - Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated
         *  - Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update
         * 
         * Defaults to `false`.
         */
        public ?bool $updateDraftIfNeeded = null,
    ) {
    }
}
