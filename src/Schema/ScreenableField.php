<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A screen tab field. */
final readonly class ScreenableField extends Dto
{
    public function __construct(
        /** The ID of the screen tab field. */
        public ?string $id = null,

        /**
         * The name of the screen tab field.
         * Required on create and update.
         * The maximum length is 255 characters.
         */
        public ?string $name = null,
    ) {
    }
}
