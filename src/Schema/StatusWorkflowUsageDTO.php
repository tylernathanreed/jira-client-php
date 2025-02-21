<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Workflows using the status. */
final readonly class StatusWorkflowUsageDTO extends Dto
{
    public function __construct(
        /** The status ID. */
        public ?string $statusId = null,

        public ?StatusWorkflowUsagePage $workflows = null,
    ) {
    }
}
