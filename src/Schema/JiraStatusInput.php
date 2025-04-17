<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class JiraStatusInput extends Dto
{
    public function __construct(
        public string $statusId,
    ) {
    }
}
