<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

final readonly class UserNavPropertyJsonBean extends Dto
{
    public function __construct(
        public ?string $key = null,

        public ?string $value = null,
    ) {
    }
}
