<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final readonly class JiraDateInput extends Dto
{
    public function __construct(
        public string $formattedDate,
    ) {
    }
}
