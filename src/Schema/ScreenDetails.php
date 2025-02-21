<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ScreenDetailsDoc
final readonly class ScreenDetails extends Dto
{
    public function __construct(
        /**
         * The name of the screen.
         * The name must be unique.
         * The maximum length is 255 characters.
         */
        public string $name,

        /**
         * The description of the screen.
         * The maximum length is 255 characters.
         */
        public ?string $description = null,
    ) {
    }
}
