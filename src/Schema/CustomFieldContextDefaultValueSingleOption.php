<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueSingleOptionDoc
final readonly class CustomFieldContextDefaultValueSingleOption extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /** The ID of the default option. */
        public string $optionId,

        public string $type,
    ) {
    }
}
