<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// ProjectDoc
final readonly class Project extends Dto
{
    public function __construct(
        /** Whether the project is archived. */
        public ?bool $archived = null,

        /** The user who archived the project. */
        public ?User $archivedBy = null,

        /** The date when the project was archived. */
        public ?DateTimeImmutable $archivedDate = null,

        /**
         * The default assignee when creating issues for this project.
         * 
         * @var 'PROJECT_LEAD'|'UNASSIGNED'|null
         */
        public ?string $assigneeType = null,

        /** The URLs of the project's avatars. */
        public ?AvatarUrlsBean $avatarUrls = null,

        /**
         * List of the components contained in the project.
         * 
         * @var ?list<ProjectComponent>
         */
        public ?array $components = null,

        /** Whether the project is marked as deleted. */
        public ?bool $deleted = null,

        /** The user who marked the project as deleted. */
        public ?User $deletedBy = null,

        /** The date when the project was marked as deleted. */
        public ?DateTimeImmutable $deletedDate = null,

        /** A brief description of the project. */
        public ?string $description = null,

        /** An email address associated with the project. */
        public ?string $email = null,

        /** Expand options that include additional project details in the response. */
        public ?string $expand = null,

        /** Whether the project is selected as a favorite. */
        public ?bool $favourite = null,

        /** The ID of the project. */
        public ?string $id = null,

        /** Insights about the project. */
        public ?ProjectInsight $insight = null,

        /**
         * Whether the project is private from the user's perspective.
         * This means the user can't see the project or any associated issues.
         */
        public ?bool $isPrivate = null,

        /** The issue type hierarchy for the project. */
        public ?Hierarchy $issueTypeHierarchy = null,

        /**
         * List of the issue types available in the project.
         * 
         * @var ?list<IssueTypeDetails>
         */
        public ?array $issueTypes = null,

        /** The key of the project. */
        public ?string $key = null,

        /** The project landing page info. */
        public ?ProjectLandingPageInfo $landingPageInfo = null,

        /** The username of the project lead. */
        public ?User $lead = null,

        /** The name of the project. */
        public ?string $name = null,

        /** User permissions on the project */
        public ?ProjectPermissions $permissions = null,

        /** The category the project belongs to. */
        public ?ProjectCategory $projectCategory = null,

        /**
         * The "project type" of the project.
         * 
         * @link https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes
         * 
         * @var 'software'|'service_desk'|'business'|null
         */
        public ?string $projectTypeKey = null,

        /** Map of project properties */
        public ?object $properties = null,

        /** The date when the project is deleted permanently. */
        public ?DateTimeImmutable $retentionTillDate = null,

        /**
         * The name and self URL for each role defined in the project.
         * For more information, see "Create project role".
         * 
         * @var array<string,string>
         */
        public ?array $roles = null,

        /** The URL of the project details. */
        public ?string $self = null,

        /** Whether the project is simplified. */
        public ?bool $simplified = null,

        /**
         * The type of the project.
         * 
         * @var 'classic'|'next-gen'|null
         */
        public ?string $style = null,

        /** A link to information about this project, such as project documentation. */
        public ?string $url = null,

        /** Unique ID for next-gen projects. */
        public ?string $uuid = null,

        /**
         * The versions defined in the project.
         * For more information, see "Create version".
         * 
         * @var ?list<Version>
         */
        public ?array $versions = null,
    ) {
    }
}
