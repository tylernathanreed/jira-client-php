<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details of a gadget position. */
final readonly class DashboardGadgetPosition extends Dto
{
    public function __construct(
        public int $row,

        public int $column,
    ) {
    }
}
