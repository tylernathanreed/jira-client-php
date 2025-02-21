<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class GetSchedulingResponse extends Dto
{
    public function __construct(
        /**
         * The dependencies for the plan.
         * This is "Sequential" or "Concurrent".
         * 
         * @var 'Sequential'|'Concurrent'
         */
        public string $dependencies,

        /** The end date field for the plan. */
        public GetDateFieldResponse $endDate,

        /**
         * The estimation unit for the plan.
         * This is "StoryPoints", "Days" or "Hours".
         * 
         * @var 'StoryPoints'|'Days'|'Hours'
         */
        public string $estimation,

        /**
         * The inferred dates for the plan.
         * This is "None", "SprintDates" or "ReleaseDates".
         * 
         * @var 'None'|'SprintDates'|'ReleaseDates'
         */
        public string $inferredDates,

        /** The start date field for the plan. */
        public GetDateFieldResponse $startDate,
    ) {
    }
}
