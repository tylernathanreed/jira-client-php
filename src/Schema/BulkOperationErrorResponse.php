<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class BulkOperationErrorResponse extends Dto
{
    public function __construct(
        /** @var ?list<ErrorMessage> */
        public ?array $errors = null,
    ) {
    }
}
