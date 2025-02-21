<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// LicenseMetricDoc
final readonly class LicenseMetric extends Dto
{
    public function __construct(
        /** The key of a specific license metric. */
        public ?string $key = null,

        /**
         * The calculated value of a licence metric linked to the key.
         * An example licence metric is the approximate number of user accounts.
         */
        public ?string $value = null,
    ) {
    }
}
