<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PrioritySchemeIdDoc
final readonly class PrioritySchemeId extends Dto
{
    public function __construct(
        /** The ID of the priority scheme. */
        public ?string $id = null,

        /** The in-progress issue migration task. */
        public ?TaskProgressBeanJsonNode $task = null,
    ) {
    }
}
