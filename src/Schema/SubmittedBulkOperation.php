<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SubmittedBulkOperationDoc
final readonly class SubmittedBulkOperation extends Dto
{
    public function __construct(
        public ?string $taskId = null,
    ) {
    }
}
