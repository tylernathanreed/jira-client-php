<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The default value for a Forge group custom field. */
final readonly class CustomFieldContextDefaultValueForgeGroupField extends Dto
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
