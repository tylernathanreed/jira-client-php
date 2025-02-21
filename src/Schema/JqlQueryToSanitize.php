<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * The JQL query to sanitize for the account ID.
 * If the account ID is null, sanitizing is performed for an anonymous user.
 */
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
