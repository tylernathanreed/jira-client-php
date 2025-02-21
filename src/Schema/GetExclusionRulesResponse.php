<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class GetExclusionRulesResponse extends Dto
{
    public function __construct(
        /** Issues completed this number of days ago are excluded from the plan. */
        public int $numberOfDaysToShowCompletedIssues,

        /**
         * The IDs of the issues excluded from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $issueIds = null,

        /**
         * The IDs of the issue types excluded from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $issueTypeIds = null,

        /**
         * The IDs of the releases excluded from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $releaseIds = null,

        /**
         * The IDs of the work status categories excluded from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $workStatusCategoryIds = null,

        /**
         * The IDs of the work statuses excluded from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $workStatusIds = null,
    ) {
    }
}
