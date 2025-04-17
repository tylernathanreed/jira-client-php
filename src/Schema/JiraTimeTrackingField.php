<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraTimeTrackingField extends Dto
{
    public function __construct(
        public string $timeRemaining,
    ) {
    }
}
