<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about data policies for a list of projects. */
final readonly class ProjectDataPolicies extends Dto
{
    public function __construct(
        /**
         * List of projects with data policies.
         * 
         * @var ?list<ProjectWithDataPolicy>
         */
        public ?array $projectDataPolicies = null,
    ) {
    }
}
