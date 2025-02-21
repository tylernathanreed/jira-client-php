<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of the time tracking configuration. */
final readonly class TimeTrackingConfiguration extends Dto
{
    public function __construct(
        /**
         * The default unit of time applied to logged time.
         * 
         * @var 'minute'|'hour'|'day'|'week'
         */
        public string $defaultUnit,

        /**
         * The format that will appear on an issue's *Time Spent* field.
         * 
         * @var 'pretty'|'days'|'hours'
         */
        public string $timeFormat,

        /** The number of days in a working week. */
        public float $workingDaysPerWeek,

        /** The number of hours in a working day. */
        public float $workingHoursPerDay,
    ) {
    }
}
