<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ChangeFilterOwnerDoc
final readonly class ChangeFilterOwner extends Dto
{
    public function __construct(
        /** The account ID of the new owner. */
        public string $accountId,
    ) {
    }
}
