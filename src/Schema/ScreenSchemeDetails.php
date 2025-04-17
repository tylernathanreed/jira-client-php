<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of a screen scheme. */
final class ScreenSchemeDetails extends Dto
{
    public function __construct(
        /**
         * The name of the screen scheme.
         * The name must be unique.
         * The maximum length is 255 characters.
         */
        public string $name,

        /**
         * The IDs of the screens for the screen types of the screen scheme.
         * Only screens used in classic projects are accepted.
         */
        public ScreenTypes $screens,

        /**
         * The description of the screen scheme.
         * The maximum length is 255 characters.
         */
        public ?string $description = null,
    ) {
    }
}
