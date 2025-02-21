<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The status reference and port that a transition is connected to. */
final readonly class StatusReferenceAndPort extends Dto
{
    public function __construct(
        /** The reference of this status. */
        public string $statusReference,

        /** The port this transition uses to connect to this status. */
        public ?int $port = null,
    ) {
    }
}
