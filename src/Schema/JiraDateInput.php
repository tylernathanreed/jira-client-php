<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraDateInput extends Dto
{
    public function __construct(
        public string $formattedDate,
    ) {
    }
}
