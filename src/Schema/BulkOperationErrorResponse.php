<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkOperationErrorResponseDoc
final readonly class BulkOperationErrorResponse extends Dto
{
    public function __construct(
        public ?array $errors = null,
    ) {
    }
}
