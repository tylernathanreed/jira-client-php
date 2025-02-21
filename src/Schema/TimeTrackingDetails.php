<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// TimeTrackingDetailsDoc
final readonly class TimeTrackingDetails extends Dto
{
    public function __construct(
        /** The original estimate of time needed for this issue in readable format. */
        public ?string $originalEstimate = null,

        /** The original estimate of time needed for this issue in seconds. */
        public ?int $originalEstimateSeconds = null,

        /** The remaining estimate of time needed for this issue in readable format. */
        public ?string $remainingEstimate = null,

        /** The remaining estimate of time needed for this issue in seconds. */
        public ?int $remainingEstimateSeconds = null,

        /** Time worked on this issue in readable format. */
        public ?string $timeSpent = null,

        /** Time worked on this issue in seconds. */
        public ?int $timeSpentSeconds = null,
    ) {
    }
}
