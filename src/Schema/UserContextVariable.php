<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UserContextVariableDoc
final readonly class UserContextVariable extends Dto
{
    public function __construct(
        /** The account ID of the user. */
        public string $accountId,

        /** Type of custom context variable. */
        public string $type,
    ) {
    }
}
