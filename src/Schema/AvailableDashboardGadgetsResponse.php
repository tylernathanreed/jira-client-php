<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of available gadgets. */
final readonly class AvailableDashboardGadgetsResponse extends Dto
{
    public function __construct(
        /**
         * The list of available gadgets.
         * 
         * @var list<AvailableDashboardGadget>
         */
        public array $gadgets,
    ) {
    }
}
