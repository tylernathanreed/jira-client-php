<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The project issue type hierarchy. */
final readonly class Hierarchy extends Dto
{
    public function __construct(
        /**
         * The ID of the base level.
         * This property is deprecated, see "Change notice: Removing hierarchy level IDs from next-gen APIs".
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/
         */
        public ?int $baseLevelId = null,

        /**
         * Details about the hierarchy level.
         * 
         * @var ?list<SimplifiedHierarchyLevel>
         */
        public ?array $levels = null,
    ) {
    }
}
