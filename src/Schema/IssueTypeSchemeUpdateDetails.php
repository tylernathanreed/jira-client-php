<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueTypeSchemeUpdateDetailsDoc
final readonly class IssueTypeSchemeUpdateDetails extends Dto
{
    public function __construct(
        /** The ID of the default issue type of the issue type scheme. */
        public ?string $defaultIssueTypeId = null,

        /**
         * The description of the issue type scheme.
         * The maximum length is 4000 characters.
         */
        public ?string $description = null,

        /**
         * The name of the issue type scheme.
         * The name must be unique.
         * The maximum length is 255 characters.
         */
        public ?string $name = null,
    ) {
    }
}
