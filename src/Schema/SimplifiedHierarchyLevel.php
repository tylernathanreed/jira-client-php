<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class SimplifiedHierarchyLevel extends Dto
{
    public function __construct(
        /**
         * The ID of the level above this one in the hierarchy.
         * This property is deprecated, see "Change notice: Removing hierarchy level IDs from next-gen APIs".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/
         */
        public ?int $aboveLevelId = null,

        /**
         * The ID of the level below this one in the hierarchy.
         * This property is deprecated, see "Change notice: Removing hierarchy level IDs from next-gen APIs".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/
         */
        public ?int $belowLevelId = null,

        /**
         * The external UUID of the hierarchy level.
         * This property is deprecated, see "Change notice: Removing hierarchy level IDs from next-gen APIs".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/
         */
        public ?string $externalUuid = null,

        public ?int $hierarchyLevelNumber = null,

        /**
         * The ID of the hierarchy level.
         * This property is deprecated, see "Change notice: Removing hierarchy level IDs from next-gen APIs".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/
         */
        public ?int $id = null,

        /**
         * The issue types available in this hierarchy level.
         * 
         * @var ?list<int>
         */
        public ?array $issueTypeIds = null,

        /** The level of this item in the hierarchy. */
        public ?int $level = null,

        /** The name of this hierarchy level. */
        public ?string $name = null,

        /**
         * The ID of the project configuration.
         * This property is deprecated, see "Change oticen: Removing hierarchy level IDs from next-gen APIs".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/
         */
        public ?int $projectConfigurationId = null,
    ) {
    }
}
