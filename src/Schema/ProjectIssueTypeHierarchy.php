<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectIssueTypeHierarchyDoc
final readonly class ProjectIssueTypeHierarchy extends Dto
{
    public function __construct(
        /**
         * Details of an issue type hierarchy level.
         * 
         * @var ?list<ProjectIssueTypesHierarchyLevel>
         */
        public ?array $hierarchy = null,

        /** The ID of the project. */
        public ?int $projectId = null,
    ) {
    }
}
