<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final readonly class JiraStatusInput extends Dto
{
    public function __construct(
        public string $statusId,
    ) {
    }
}
