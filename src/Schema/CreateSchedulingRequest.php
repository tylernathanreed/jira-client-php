<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreateSchedulingRequestDoc
final readonly class CreateSchedulingRequest extends Dto
{
    public function __construct(
        /**
         * The estimation unit for the plan.
         * This must be "StoryPoints", "Days" or "Hours".
         * 
         * @var 'StoryPoints'|'Days'|'Hours'
         */
        public string $estimation,

        /**
         * The dependencies for the plan.
         * This must be "Sequential" or "Concurrent".
         * 
         * @var 'Sequential'|'Concurrent'|null
         */
        public ?string $dependencies = null,

        /** The end date field for the plan. */
        public ?CreateDateFieldRequest $endDate = null,

        /**
         * The inferred dates for the plan.
         * This must be "None", "SprintDates" or "ReleaseDates".
         * 
         * @var 'None'|'SprintDates'|'ReleaseDates'|null
         */
        public ?string $inferredDates = null,

        /** The start date field for the plan. */
        public ?CreateDateFieldRequest $startDate = null,
    ) {
    }
}
