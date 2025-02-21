<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Defaults for a User Picker (single) custom field. */
final readonly class CustomFieldContextSingleUserPickerDefaults extends Dto
{
    public function __construct(
        /** The ID of the default user. */
        public string $accountId,

        /** The ID of the context. */
        public string $contextId,

        public string $type,

        public UserFilter $userFilter,
    ) {
    }
}
