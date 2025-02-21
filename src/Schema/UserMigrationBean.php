<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class UserMigrationBean extends Dto
{
    public function __construct(
        public ?string $accountId = null,

        public ?string $key = null,

        public ?string $username = null,
    ) {
    }
}
