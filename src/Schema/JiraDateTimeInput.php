<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraDateTimeInputDoc
final readonly class JiraDateTimeInput extends Dto
{
    public function __construct(
        public string $formattedDateTime,
    ) {
    }
}
