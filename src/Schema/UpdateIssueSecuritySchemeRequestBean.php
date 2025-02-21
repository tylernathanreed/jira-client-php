<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class UpdateIssueSecuritySchemeRequestBean extends Dto
{
    public function __construct(
        /** The description of the security scheme scheme. */
        public ?string $description = null,

        /**
         * The name of the security scheme scheme.
         * Must be unique.
         */
        public ?string $name = null,
    ) {
    }
}
