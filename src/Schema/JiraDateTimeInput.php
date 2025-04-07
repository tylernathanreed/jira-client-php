<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class JiraDateTimeInput extends Dto
{
    public function __construct(
        public string $formattedDateTime,
    ) {
    }
}
