<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraDateTimeInput extends Dto
{
    public function __construct(
        public string $formattedDateTime,
    ) {
    }
}
