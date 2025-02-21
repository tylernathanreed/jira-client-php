<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusReferenceAndPortDoc
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
