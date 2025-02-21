<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SetDefaultResolutionRequestDoc
final readonly class SetDefaultResolutionRequest extends Dto
{
    public function __construct(
        /**
         * The ID of the new default issue resolution.
         * Must be an existing ID or null.
         * Setting this to null erases the default resolution setting.
         */
        public string $id,
    ) {
    }
}
