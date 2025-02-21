<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ScreenableTabDoc
final readonly class ScreenableTab extends Dto
{
    public function __construct(
        /**
         * The name of the screen tab.
         * The maximum length is 255 characters.
         */
        public string $name,

        /** The ID of the screen tab. */
        public ?int $id = null,
    ) {
    }
}
