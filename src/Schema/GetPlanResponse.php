<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class GetPlanResponse extends Dto
{
    public function __construct(
        /** The plan ID. */
        public int $id,

        /** The scheduling settings for the plan. */
        public GetSchedulingResponse $scheduling,

        /**
         * The plan status.
         * This is "Active", "Trashed" or "Archived".
         * 
         * @var 'Active'|'Trashed'|'Archived'
         */
        public string $status,

        /**
         * The cross-project releases included in the plan.
         * 
         * @var ?list<GetCrossProjectReleaseResponse>
         */
        public ?array $crossProjectReleases = null,

        /**
         * The custom fields for the plan.
         * 
         * @var ?list<GetCustomFieldResponse>
         */
        public ?array $customFields = null,

        /** The exclusion rules for the plan. */
        public ?GetExclusionRulesResponse $exclusionRules = null,

        /**
         * The issue sources included in the plan.
         * 
         * @var ?list<GetIssueSourceResponse>
         */
        public ?array $issueSources = null,

        /** The date when the plan was last saved in UTC. */
        public ?string $lastSaved = null,

        /** The account ID of the plan lead. */
        public ?string $leadAccountId = null,

        /** The plan name. */
        public ?string $name = null,

        /**
         * The permissions for the plan.
         * 
         * @var ?list<GetPermissionResponse>
         */
        public ?array $permissions = null,
    ) {
    }
}
