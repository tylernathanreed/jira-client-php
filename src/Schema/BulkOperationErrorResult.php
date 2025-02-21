<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkOperationErrorResultDoc
final readonly class BulkOperationErrorResult extends Dto
{
    public function __construct(
        public ?ErrorCollection $elementErrors = null,

        public ?int $failedElementNumber = null,

        public ?int $status = null,
    ) {
    }
}
