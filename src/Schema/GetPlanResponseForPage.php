<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class GetPlanResponseForPage extends Dto
{
    public function __construct(
        /** The plan ID. */
        public string $id,

        /** The plan name. */
        public string $name,

        /**
         * The plan status.
         * This is "Active", "Trashed" or "Archived".
         * 
         * @var 'Active'|'Trashed'|'Archived'
         */
        public string $status,

        /**
         * The issue sources included in the plan.
         * 
         * @var ?list<GetIssueSourceResponse>
         */
        public ?array $issueSources = null,
    ) {
    }
}
