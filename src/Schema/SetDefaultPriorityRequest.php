<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SetDefaultPriorityRequestDoc
final readonly class SetDefaultPriorityRequest extends Dto
{
    public function __construct(
        /**
         * The ID of the new default issue priority.
         * Must be an existing ID or null.
         * Setting this to null erases the default priority setting.
         */
        public string $id,
    ) {
    }
}
