<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ProjectIssueTypesHierarchyLevelDoc
final readonly class ProjectIssueTypesHierarchyLevel extends Dto
{
    public function __construct(
        /**
         * The ID of the issue type hierarchy level.
         * This property is deprecated, see "Change notice: Removing hierarchy level IDs from next-gen APIs".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/
         */
        public ?string $entityId = null,

        /**
         * The list of issue types in the hierarchy level.
         * 
         * @var ?list<IssueTypeInfo>
         */
        public ?array $issueTypes = null,

        /** The level of the issue type hierarchy level. */
        public ?int $level = null,

        /** The name of the issue type hierarchy level. */
        public ?string $name = null,
    ) {
    }
}
