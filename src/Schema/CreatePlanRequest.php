<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreatePlanRequestDoc
final readonly class CreatePlanRequest extends Dto
{
    public function __construct(
        /**
         * The issue sources to include in the plan.
         * 
         * @var list<CreateIssueSourceRequest>
         */
        public array $issueSources,

        /** The plan name. */
        public string $name,

        /** The scheduling settings for the plan. */
        public CreateSchedulingRequest $scheduling,

        /**
         * The cross-project releases to include in the plan.
         * 
         * @var ?list<CreateCrossProjectReleaseRequest>
         */
        public ?array $crossProjectReleases = null,

        /**
         * The custom fields for the plan.
         * 
         * @var ?list<CreateCustomFieldRequest>
         */
        public ?array $customFields = null,

        /** The exclusion rules for the plan. */
        public ?CreateExclusionRulesRequest $exclusionRules = null,

        /** The account ID of the plan lead. */
        public ?string $leadAccountId = null,

        /**
         * The permissions for the plan.
         * 
         * @var ?list<CreatePermissionRequest>
         */
        public ?array $permissions = null,
    ) {
    }
}
