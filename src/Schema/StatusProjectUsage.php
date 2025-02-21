<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusProjectUsageDoc
final readonly class StatusProjectUsage extends Dto
{
    public function __construct(
        /** The project ID. */
        public ?string $id = null,
    ) {
    }
}
