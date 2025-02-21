<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CustomFieldContextDefaultValueForgeMultiUserFieldDoc
final readonly class CustomFieldContextDefaultValueForgeMultiUserField extends Dto
{
    public function __construct(
        /**
         * The IDs of the default users.
         * 
         * @var list<string>
         */
        public array $accountIds,

        /** The ID of the context. */
        public string $contextId,

        public string $type,
    ) {
    }
}
