<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectDetailsDoc
final readonly class ProjectDetails extends Dto
{
    public function __construct(
        /** The URLs of the project's avatars. */
        public ?AvatarUrlsBean $avatarUrls = null,

        /** The ID of the project. */
        public ?string $id = null,

        /** The key of the project. */
        public ?string $key = null,

        /** The name of the project. */
        public ?string $name = null,

        /** The category the project belongs to. */
        public ?UpdatedProjectCategory $projectCategory = null,

        /**
         * The "project type" of the project.
         * 
         * @link https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes
         * 
         * @var 'software'|'service_desk'|'business'|null
         */
        public ?string $projectTypeKey = null,

        /** The URL of the project details. */
        public ?string $self = null,

        /** Whether or not the project is simplified. */
        public ?bool $simplified = null,
    ) {
    }
}
