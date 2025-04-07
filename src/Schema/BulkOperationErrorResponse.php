<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class BulkOperationErrorResponse extends Dto
{
    public function __construct(
        /** @var ?list<ErrorMessage> */
        public ?array $errors = null,
    ) {
    }
}
