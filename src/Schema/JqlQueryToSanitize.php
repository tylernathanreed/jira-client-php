<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JqlQueryToSanitizeDoc
final readonly class JqlQueryToSanitize extends Dto
{
    public function __construct(
        /** The query to sanitize. */
        public string $query,

        /**
         * The account ID of the user, which uniquely identifies the user across all Atlassian products.
         * For example, *5b10ac8d82e05b22cc7d4ef5*.
         */
        public ?string $accountId = null,
    ) {
    }
}
