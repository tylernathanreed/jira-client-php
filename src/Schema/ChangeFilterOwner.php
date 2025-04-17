<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The account ID of the new owner. */
final class ChangeFilterOwner extends Dto
{
    public function __construct(
        /** The account ID of the new owner. */
        public string $accountId,
    ) {
    }
}
