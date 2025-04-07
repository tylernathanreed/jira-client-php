<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraDateInput extends Dto
{
    public function __construct(
        public string $formattedDate,
    ) {
    }
}
