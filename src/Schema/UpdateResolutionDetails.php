<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an issue resolution. */
final readonly class UpdateResolutionDetails extends Dto
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
