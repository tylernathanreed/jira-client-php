<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusProjectUsageDTODoc
final readonly class StatusProjectUsageDTO extends Dto
{
    public function __construct(
        public ?StatusProjectUsagePage $projects = null,

        /** The status ID. */
        public ?string $statusId = null,
    ) {
    }
}
