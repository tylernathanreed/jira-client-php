<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreateExclusionRulesRequestDoc
final readonly class CreateExclusionRulesRequest extends Dto
{
    public function __construct(
        /**
         * The IDs of the issues to exclude from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $issueIds = null,

        /**
         * The IDs of the issue types to exclude from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $issueTypeIds = null,

        /** Issues completed this number of days ago will be excluded from the plan. */
        public ?int $numberOfDaysToShowCompletedIssues = null,

        /**
         * The IDs of the releases to exclude from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $releaseIds = null,

        /**
         * The IDs of the work status categories to exclude from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $workStatusCategoryIds = null,

        /**
         * The IDs of the work statuses to exclude from the plan.
         * 
         * @var ?list<int>
         */
        public ?array $workStatusIds = null,
    ) {
    }
}
