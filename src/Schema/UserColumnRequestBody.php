<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UserColumnRequestBodyDoc
final readonly class UserColumnRequestBody extends Dto
{
    public function __construct(
        public ?array $columns = null,
    ) {
    }
}
