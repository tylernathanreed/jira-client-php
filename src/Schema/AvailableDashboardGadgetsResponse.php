<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

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
