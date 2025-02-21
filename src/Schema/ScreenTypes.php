<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ScreenTypesDoc
final readonly class ScreenTypes extends Dto
{
    public function __construct(
        /**
         * The ID of the default screen.
         * Required when creating a screen scheme.
         */
        public int $default,

        /** The ID of the create screen. */
        public ?int $create = null,

        /** The ID of the edit screen. */
        public ?int $edit = null,

        /** The ID of the view screen. */
        public ?int $view = null,
    ) {
    }
}
