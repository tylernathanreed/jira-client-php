<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusWorkflowUsageDTODoc
final readonly class StatusWorkflowUsageDTO extends Dto
{
    public function __construct(
        /** The status ID. */
        public ?string $statusId = null,

        public ?StatusWorkflowUsagePage $workflows = null,
    ) {
    }
}
