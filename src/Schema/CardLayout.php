<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Card layout configuration. */
final class CardLayout extends Dto
{
    public function __construct(
        /** Whether to show days in column */
        public ?bool $showDaysInColumn = false,
    ) {
    }
}
