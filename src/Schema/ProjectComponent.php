<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a project component. */
final readonly class ProjectComponent extends Dto
{
    public function __construct(
        /**
         * Compass component's ID.
         * Can't be updated.
         * Not required for creating a Project Component.
         */
        public ?string $ari = null,

        /**
         * The details of the user associated with `assigneeType`, if any.
         * See `realAssignee` for details of the user assigned to issues created with this component.
         */
        public ?User $assignee = null,

        /**
         * The nominal user type used to determine the assignee for issues created with this component.
         * See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined.
         * Can take the following values:
         * 
         *  - `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in
         *  - `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component
         *  - `UNASSIGNED` an assignee is not set for issues created with this component
         *  - `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in
         * 
         * Default value: `PROJECT_DEFAULT`.
         *  
         * Optional when creating or updating a component.
         * 
         * @var 'PROJECT_DEFAULT'|'COMPONENT_LEAD'|'PROJECT_LEAD'|'UNASSIGNED'|null
         */
        public ?string $assigneeType = null,

        /**
         * The description for the component.
         * Optional when creating or updating a component.
         */
        public ?string $description = null,

        /** The unique identifier for the component. */
        public ?string $id = null,

        /**
         * Whether a user is associated with `assigneeType`.
         * For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned.
         */
        public ?bool $isAssigneeTypeValid = null,

        /** The user details for the component's lead user. */
        public ?User $lead = null,

        /**
         * The accountId of the component's lead user.
         * The accountId uniquely identifies the user across all Atlassian products.
         * For example, *5b10ac8d82e05b22cc7d4ef5*.
         */
        public ?string $leadAccountId = null,

        /**
         * This property is no longer available and will be removed from the documentation soon.
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $leadUserName = null,

        /**
         * Compass component's metadata.
         * Can't be updated.
         * Not required for creating a Project Component.
         * 
         * @var array<string,string>
         */
        public ?array $metadata = null,

        /**
         * The unique name for the component in the project.
         * Required when creating a component.
         * Optional when updating a component.
         * The maximum length is 255 characters.
         */
        public ?string $name = null,

        /**
         * The key of the project the component is assigned to.
         * Required when creating a component.
         * Can't be updated.
         */
        public ?string $project = null,

        /** The ID of the project the component is assigned to. */
        public ?int $projectId = null,

        /** The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee. */
        public ?User $realAssignee = null,

        /**
         * The type of the assignee that is assigned to issues created with this component, when an assignee cannot be set from the `assigneeType`.
         * For example, `assigneeType` is set to `COMPONENT_LEAD` but no component lead is set.
         * This property is set to one of the following values:
         * 
         *  - `PROJECT_LEAD` when `assigneeType` is `PROJECT_LEAD` and the project lead has permission to be assigned issues in the project that the component is in
         *  - `COMPONENT_LEAD` when `assignee`Type is `COMPONENT_LEAD` and the component lead has permission to be assigned issues in the project that the component is in
         *  - `UNASSIGNED` when `assigneeType` is `UNASSIGNED` and Jira is configured to allow unassigned issues
         *  - `PROJECT_DEFAULT` when none of the preceding cases are true.
         * 
         * @var 'PROJECT_DEFAULT'|'COMPONENT_LEAD'|'PROJECT_LEAD'|'UNASSIGNED'|null
         */
        public ?string $realAssigneeType = null,

        /** The URL of the component. */
        public ?string $self = null,
    ) {
    }
}
