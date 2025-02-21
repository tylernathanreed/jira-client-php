<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueProjectDoc
final readonly class CustomFieldContextDefaultValueProject extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /** The ID of the default project. */
        public string $projectId,

        public string $type,
    ) {
    }
}
