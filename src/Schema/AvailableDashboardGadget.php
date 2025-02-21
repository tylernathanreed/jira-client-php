<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// AvailableDashboardGadgetDoc
final readonly class AvailableDashboardGadget extends Dto
{
    public function __construct(
        /** The title of the gadget. */
        public string $title,

        /** The module key of the gadget type. */
        public ?string $moduleKey = null,

        /** The URI of the gadget type. */
        public ?string $uri = null,
    ) {
    }
}
