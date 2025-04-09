<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Project Details */
final readonly class CustomTemplatesProjectDetails extends Dto
{
    public function __construct(
        /**
         * The access level of the project.
         * Only used by team-managed project
         * 
         * @var 'open'|'limited'|'private'|'free'|null
         * 
         * @example 'private'
         */
        public ?string $accessLevel = null,

        /**
         * Additional properties of the project
         * 
         * @var array<string,string>
         */
        public ?array $additionalProperties = null,

        /**
         * The default assignee when creating issues in the project
         * 
         * @var 'PROJECT_DEFAULT'|'COMPONENT_LEAD'|'PROJECT_LEAD'|'UNASSIGNED'|null
         * 
         * @example 'PROJECT_LEAD'
         */
        public ?string $assigneeType = null,

        /**
         * The ID of the project's avatar.
         * Use the \"Get project avatars\" operation to list the available avatars in a project.
         * 
         * @link \#api-rest-api-3-project-projectIdOrKey-avatar-get
         * 
         * @example 10200
         */
        public ?int $avatarId = null,

        /**
         * The ID of the project's category.
         * A complete list of category IDs is found using the "Get all project categories" operation.
         */
        public ?int $categoryId = null,

        /**
         * Brief description of the project
         * 
         * @example 'This is a project for Foo Bar'
         */
        public ?string $description = null,

        /**
         * Whether components are enabled for the project.
         * Only used by company-managed project
         */
        public ?bool $enableComponents = false,

        /**
         * Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters.
         * The maximum length is 10 characters.
         * 
         * @example 'PRJ'
         */
        public ?string $key = null,

        /**
         * The default language for the project
         * 
         * @example 'en'
         */
        public ?string $language = null,

        /**
         * The account ID of the project lead.
         * Either `lead` or `leadAccountId` must be set when creating a project.
         * Cannot be provided with `lead`.
         * 
         * @example '1234567890'
         */
        public ?string $leadAccountId = null,

        /**
         * Name of the project
         * 
         * @example 'Project Foo Bar'
         */
        public ?string $name = null,

        /**
         * A link to information about this project, such as project documentation
         * 
         * @example 'https://www.example.com'
         */
        public ?string $url = null,
    ) {
    }
}
