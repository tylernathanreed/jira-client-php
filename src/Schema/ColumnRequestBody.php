<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ColumnRequestBodyDoc
final readonly class ColumnRequestBody extends Dto
{
    public function __construct(
        public ?array $columns = null,
    ) {
    }
}
