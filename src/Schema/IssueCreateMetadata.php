<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The wrapper for the issue creation metadata for a list of projects. */
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
