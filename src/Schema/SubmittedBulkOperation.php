<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class SubmittedBulkOperation extends Dto
{
    public function __construct(
        public ?string $taskId = null,
    ) {
    }
}
