<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class WarningCollection extends Dto
{
    public function __construct(
        /** @var ?list<string> */
        public ?array $warnings = null,
    ) {
    }
}
