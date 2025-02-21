<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class ColumnRequestBody extends Dto
{
    public function __construct(
        public ?array $columns = null,
    ) {
    }
}
