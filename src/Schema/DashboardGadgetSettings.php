<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DashboardGadgetSettingsDoc
final readonly class DashboardGadgetSettings extends Dto
{
    public function __construct(
        /**
         * The color of the gadget.
         * Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
         */
        public ?string $color = null,

        /**
         * Whether to ignore the validation of module key and URI.
         * For example, when a gadget is created that is a part of an application that isn't installed.
         */
        public ?bool $ignoreUriAndModuleKeyValidation = null,

        /**
         * The module key of the gadget type.
         * Can't be provided with `uri`.
         */
        public ?string $moduleKey = null,

        /**
         * The position of the gadget.
         * When the gadget is placed into the position, other gadgets in the same column are moved down to accommodate it.
         */
        public ?DashboardGadgetPosition $position = null,

        /** The title of the gadget. */
        public ?string $title = null,

        /**
         * The URI of the gadget type.
         * Can't be provided with `moduleKey`.
         */
        public ?string $uri = null,
    ) {
    }
}
