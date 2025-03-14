<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default value for a Forge collection of groups custom field. */
final readonly class CustomFieldContextDefaultValueForgeMultiGroupField extends Dto
{
    public function __construct(
        /** The ID of the context. */
        public string $contextId,

        /**
         * The IDs of the default groups.
         * 
         * @var list<string>
         */
        public array $groupIds,

        public string $type,
    ) {
    }
}
