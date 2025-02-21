<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// WorkflowStatusAndPortDoc
final readonly class WorkflowStatusAndPort extends Dto
{
    public function __construct(
        /** The port the transition is connected to this status. */
        public ?int $port = null,

        /** The reference of this status. */
        public ?string $statusReference = null,
    ) {
    }
}
