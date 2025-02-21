<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class WarningCollection extends Dto
{
    public function __construct(
        public ?array $warnings = null,
    ) {
    }
}
