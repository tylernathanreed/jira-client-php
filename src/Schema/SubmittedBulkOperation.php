<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class SubmittedBulkOperation extends Dto
{
    public function __construct(
        public ?string $taskId = null,
    ) {
    }
}
