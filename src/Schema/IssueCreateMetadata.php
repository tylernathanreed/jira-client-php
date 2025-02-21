<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueCreateMetadataDoc
final readonly class IssueCreateMetadata extends Dto
{
    public function __construct(
        /** Expand options that include additional project details in the response. */
        public ?string $expand = null,

        /**
         * List of projects and their issue creation metadata.
         * 
         * @var ?list<ProjectIssueCreateMetadata>
         */
        public ?array $projects = null,
    ) {
    }
}
