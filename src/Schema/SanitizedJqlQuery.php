<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// SanitizedJqlQueryDoc
final readonly class SanitizedJqlQuery extends Dto
{
    public function __construct(
        /** The account ID of the user for whom sanitization was performed. */
        public ?string $accountId = null,

        /** The list of errors. */
        public ?ErrorCollection $errors = null,

        /** The initial query. */
        public ?string $initialQuery = null,

        /** The sanitized query, if there were no errors. */
        public ?string $sanitizedQuery = null,
    ) {
    }
}
