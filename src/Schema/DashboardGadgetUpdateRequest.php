<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DashboardGadgetUpdateRequestDoc
final readonly class DashboardGadgetUpdateRequest extends Dto
{
    public function __construct(
        /**
         * The color of the gadget.
         * Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
         */
        public ?string $color = null,

        /** The position of the gadget. */
        public ?DashboardGadgetPosition $position = null,

        /** The title of the gadget. */
        public ?string $title = null,
    ) {
    }
}
