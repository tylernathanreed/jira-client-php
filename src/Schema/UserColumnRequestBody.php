<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class UserColumnRequestBody extends Dto
{
    public function __construct(
        public ?array $columns = null,
    ) {
    }
}
