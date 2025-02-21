<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DateRangeFilterRequestDoc
final readonly class DateRangeFilterRequest extends Dto
{
    public function __construct(
        /** List issues archived after a specified date, passed in the YYYY-MM-DD format. */
        public string $dateAfter,

        /** List issues archived before a specified date provided in the YYYY-MM-DD format. */
        public string $dateBefore,
    ) {
    }
}
