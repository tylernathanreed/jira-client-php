<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdateProjectDetailsDoc
final readonly class UpdateProjectDetails extends Dto
{
    public function __construct(
        /**
         * The default assignee when creating issues for this project.
         * 
         * @var 'PROJECT_LEAD'|'UNASSIGNED'|null
         */
        public ?string $assigneeType = null,

        /** An integer value for the project's avatar. */
        public ?int $avatarId = null,

        /**
         * The ID of the project's category.
         * A complete list of category IDs is found using the "Get all project categories" operation.
         * To remove the project category from the project, set the value to `-1.`
         */
        public ?int $categoryId = null,

        /** A brief description of the project. */
        public ?string $description = null,

        /**
         * The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues.
         * Use the "Get issue security schemes" resource to get all issue security scheme IDs.
         */
        public ?int $issueSecurityScheme = null,

        /**
         * Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters.
         * The maximum length is 10 characters.
         */
        public ?string $key = null,

        /**
         * This parameter is deprecated because of privacy changes.
         * Use `leadAccountId` instead.
         * See the "migration guide" for details.
         * The user name of the project lead.
         * Cannot be provided with `leadAccountId`.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $lead = null,

        /**
         * The account ID of the project lead.
         * Cannot be provided with `lead`.
         */
        public ?string $leadAccountId = null,

        /** The name of the project. */
        public ?string $name = null,

        /**
         * The ID of the notification scheme for the project.
         * Use the "Get notification schemes" resource to get a list of notification scheme IDs.
         */
        public ?int $notificationScheme = null,

        /**
         * The ID of the permission scheme for the project.
         * Use the "Get all permission schemes" resource to see a list of all permission scheme IDs.
         */
        public ?int $permissionScheme = null,

        /**
         * Previous project keys to be released from the current project.
         * Released keys must belong to the current project and not contain the current project key
         * 
         * @var ?list<string>
         */
        public ?array $releasedProjectKeys = null,

        /** A link to information about this project, such as project documentation */
        public ?string $url = null,
    ) {
    }
}
