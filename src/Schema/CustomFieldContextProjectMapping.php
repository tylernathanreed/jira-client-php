<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextProjectMappingDoc
final readonly class CustomFieldContextProjectMapping extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /** Whether context is global. */
        public ?bool $isGlobalContext = null,

        /** The ID of the project. */
        public ?string $projectId = null,
    ) {
    }
}
