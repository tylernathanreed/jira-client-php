<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreateWorkflowTransitionScreenDetailsDoc
final readonly class CreateWorkflowTransitionScreenDetails extends Dto
{
    public function __construct(
        /** The ID of the screen. */
        public string $id,
    ) {
    }
}
