<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class IssueFieldOptionScopeBean extends Dto
{
    public function __construct(
        /**
         * Defines the behavior of the option within the global context.
         * If this property is set, even if set to an empty object, then the option is available in all projects.
         */
        public ?GlobalScopeBean $global = null,

        /**
         * DEPRECATED
         * 
         * @var ?list<int>
         */
        public ?array $projects = null,

        /**
         * Defines the projects in which the option is available and the behavior of the option within each project.
         * Specify one object per project.
         * The behavior of the option in a project context overrides the behavior in the global context.
         * 
         * @var ?list<ProjectScopeBean>
         */
        public ?array $projects2 = null,
    ) {
    }
}
