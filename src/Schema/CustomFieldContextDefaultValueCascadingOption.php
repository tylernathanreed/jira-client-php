<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueCascadingOptionDoc
final readonly class CustomFieldContextDefaultValueCascadingOption extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /** The ID of the default option. */
        public string $optionId,

        public string $type,

        /** The ID of the default cascading option. */
        public ?string $cascadingOptionId = null,
    ) {
    }
}
