<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a screen. */
final readonly class UpdateScreenDetails extends Dto
{
    public function __construct(
        /**
         * The description of the screen.
         * The maximum length is 255 characters.
         */
        public ?string $description = null,

        /**
         * The name of the screen.
         * The name must be unique.
         * The maximum length is 255 characters.
         */
        public ?string $name = null,
    ) {
    }
}
