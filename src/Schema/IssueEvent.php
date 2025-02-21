<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueEventDoc
final readonly class IssueEvent extends Dto
{
    public function __construct(
        /** The ID of the event. */
        public ?int $id = null,

        /** The name of the event. */
        public ?string $name = null,
    ) {
    }
}
