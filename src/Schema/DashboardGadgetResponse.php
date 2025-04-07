<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The list of gadgets on the dashboard. */
final readonly class DashboardGadgetResponse extends Dto
{
    public function __construct(
        /**
         * The list of gadgets.
         * 
         * @var list<DashboardGadget>
         */
        public array $gadgets,
    ) {
    }
}
