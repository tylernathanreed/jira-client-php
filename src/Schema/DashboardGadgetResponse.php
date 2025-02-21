<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DashboardGadgetResponseDoc
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
