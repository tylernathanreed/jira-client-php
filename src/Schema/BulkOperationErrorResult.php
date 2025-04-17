<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class BulkOperationErrorResult extends Dto
{
    public function __construct(
        public ?ErrorCollection $elementErrors = null,

        public ?int $failedElementNumber = null,

        public ?int $status = null,
    ) {
    }
}
