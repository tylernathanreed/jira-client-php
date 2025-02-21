<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueForgeUserFieldDoc
final readonly class CustomFieldContextDefaultValueForgeUserField extends Dto
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
