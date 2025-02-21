<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * Jira instance health check results.
 * Deprecated and no longer returned.
 */
final readonly class HealthCheckResult extends Dto
{
    public function __construct(
        /** The description of the Jira health check item. */
        public ?string $description = null,

        /** The name of the Jira health check item. */
        public ?string $name = null,

        /** Whether the Jira health check item passed or failed. */
        public ?bool $passed = null,
    ) {
    }
}
