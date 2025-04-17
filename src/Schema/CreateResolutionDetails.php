<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of an issue resolution. */
final class CreateResolutionDetails extends Dto
{
    public function __construct(
        /**
         * The name of the resolution.
         * Must be unique (case-insensitive).
         */
        public string $name,

        /** The description of the resolution. */
        public ?string $description = null,
    ) {
    }
}
