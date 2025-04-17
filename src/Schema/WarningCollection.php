<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class WarningCollection extends Dto
{
    public function __construct(
        /** @var ?list<string> */
        public ?array $warnings = null,
    ) {
    }
}
