<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the issue creation metadata for a project. */
final readonly class ProjectIssueCreateMetadata extends Dto
{
    public function __construct(
        /** List of the project's avatars, returning the avatar size and associated URL. */
        public ?AvatarUrlsBean $avatarUrls = null,

        /** Expand options that include additional project issue create metadata details in the response. */
        public ?string $expand = null,

        /** The ID of the project. */
        public ?string $id = null,

        /**
         * List of the issue types supported by the project.
         * 
         * @var ?list<IssueTypeIssueCreateMetadata>
         */
        public ?array $issuetypes = null,

        /** The key of the project. */
        public ?string $key = null,

        /** The name of the project. */
        public ?string $name = null,

        /** The URL of the project. */
        public ?string $self = null,
    ) {
    }
}
