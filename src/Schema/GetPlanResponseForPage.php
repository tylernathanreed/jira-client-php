<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class GetPlanResponseForPage extends Dto
{
    public function __construct(
        /** The plan ID. */
        public string $id,

        /** The plan name. */
        public string $name,

        /** Default scenario ID. */
        public string $scenarioId,

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
