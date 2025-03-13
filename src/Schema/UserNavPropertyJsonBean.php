<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class UserNavPropertyJsonBean extends Dto
{
    public function __construct(
        public ?string $key = null,

        public ?string $value = null,
    ) {
    }
}
