<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a screen scheme. */
final readonly class UpdateScreenSchemeDetails extends Dto
{
    public function __construct(
        /**
         * The description of the screen scheme.
         * The maximum length is 255 characters.
         */
        public ?string $description = null,

        /**
         * The name of the screen scheme.
         * The name must be unique.
         * The maximum length is 255 characters.
         */
        public ?string $name = null,

        /**
         * The IDs of the screens for the screen types of the screen scheme.
         * Only screens used in classic projects are accepted.
         */
        public ?UpdateScreenTypes $screens = null,
    ) {
    }
}
