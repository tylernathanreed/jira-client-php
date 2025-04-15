<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final readonly class ColumnRequestBody extends Dto
{
    public function __construct(
        /** @var ?list<string> */
        public ?array $columns = null,
    ) {
    }
}
