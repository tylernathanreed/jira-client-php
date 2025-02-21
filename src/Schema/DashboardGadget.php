<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DashboardGadgetDoc
final readonly class DashboardGadget extends Dto
{
    public function __construct(
        /**
         * The color of the gadget.
         * Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`.
         * 
         * @var 'blue'|'red'|'yellow'|'green'|'cyan'|'purple'|'gray'|'white'
         */
        public string $color,

        /** The ID of the gadget instance. */
        public int $id,

        /** The position of the gadget. */
        public DashboardGadgetPosition $position,

        /** The title of the gadget. */
        public string $title,

        /** The module key of the gadget type. */
        public ?string $moduleKey = null,

        /** The URI of the gadget type. */
        public ?string $uri = null,
    ) {
    }
}
