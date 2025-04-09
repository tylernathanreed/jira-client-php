<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** Card layout configuration. */
final readonly class CardLayout extends Dto
{
    public function __construct(
        /** Whether to show days in column */
        public ?bool $showDaysInColumn = false,
    ) {
    }
}
