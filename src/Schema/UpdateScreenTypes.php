<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdateScreenTypesDoc
final readonly class UpdateScreenTypes extends Dto
{
    public function __construct(
        /**
         * The ID of the create screen.
         * To remove the screen association, pass a null.
         */
        public ?string $create = null,

        /**
         * The ID of the default screen.
         * When specified, must include a screen ID as a default screen is required.
         */
        public ?string $default = null,

        /**
         * The ID of the edit screen.
         * To remove the screen association, pass a null.
         */
        public ?string $edit = null,

        /**
         * The ID of the view screen.
         * To remove the screen association, pass a null.
         */
        public ?string $view = null,
    ) {
    }
}
