<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The status reference and port that a transition is connected to. */
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
