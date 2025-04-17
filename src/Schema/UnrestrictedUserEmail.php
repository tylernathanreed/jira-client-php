<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class UnrestrictedUserEmail extends Dto
{
    public function __construct(
        /** The accountId of the user */
        public ?string $accountId = null,

        /** The email of the user */
        public ?string $email = null,
    ) {
    }
}
