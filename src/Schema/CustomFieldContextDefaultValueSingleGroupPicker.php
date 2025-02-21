<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueSingleGroupPickerDoc
final readonly class CustomFieldContextDefaultValueSingleGroupPicker extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /** The ID of the the default group. */
        public string $groupId,

        public string $type,
    ) {
    }
}
