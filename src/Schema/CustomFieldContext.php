<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDoc
final readonly class CustomFieldContext extends Dto
{
    public function __construct(
        /** The description of the context. */
        public string $description,

        /** The ID of the context. */
        public string $id,

        /** Whether the context apply to all issue types. */
        public bool $isAnyIssueType,

        /** Whether the context is global. */
        public bool $isGlobalContext,

        /** The name of the context. */
        public string $name,
    ) {
    }
}
