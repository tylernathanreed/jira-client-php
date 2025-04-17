<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The hierarchy of issue types within a project. */
final class ProjectIssueTypeHierarchy extends Dto
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
