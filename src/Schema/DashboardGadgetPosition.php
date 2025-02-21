<?php

namespace Jira\Client\Schema;

use Jira\Client\Attributes\MapName;
use Jira\Client\Dto;

// DashboardGadgetPositionDoc
final readonly class DashboardGadgetPosition extends Dto
{
    public function __construct(
        #[MapName('The column position of the gadget.')]
        public int $theColumnPositionOfTheGadget.,

        #[MapName('The row position of the gadget.')]
        public int $theRowPositionOfTheGadget.,
    ) {
    }
}
