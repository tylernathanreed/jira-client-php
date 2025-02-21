<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueForgeStringFieldDoc
final readonly class CustomFieldContextDefaultValueForgeStringField extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        public string $type,

        /**
         * The default text.
         * The maximum length is 254 characters.
         */
        public ?string $text = null,
    ) {
    }
}
