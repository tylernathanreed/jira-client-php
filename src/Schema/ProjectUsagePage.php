<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectUsagePageDoc
final readonly class ProjectUsagePage extends Dto
{
    public function __construct(
        /** Page token for the next page of project usages. */
        public ?string $nextPageToken = null,

        /**
         * The list of projects.
         * 
         * @var ?list<ProjectUsage>
         */
        public ?array $values = null,
    ) {
    }
}
