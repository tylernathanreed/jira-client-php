<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of an issue resolution. */
final class UpdateResolutionDetails extends Dto
{
    public function __construct(
        /**
         * The name of the resolution.
         * Must be unique.
         */
        public string $name,

        /** The description of the resolution. */
        public ?string $description = null,
    ) {
    }
}
