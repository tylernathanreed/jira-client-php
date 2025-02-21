<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraDateInputDoc
final readonly class JiraDateInput extends Dto
{
    public function __construct(
        public string $formattedDate,
    ) {
    }
}
