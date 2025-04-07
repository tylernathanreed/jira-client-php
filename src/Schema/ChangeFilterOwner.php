<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** The account ID of the new owner. */
final readonly class ChangeFilterOwner extends Dto
{
    public function __construct(
        /** The account ID of the new owner. */
        public string $accountId,
    ) {
    }
}
