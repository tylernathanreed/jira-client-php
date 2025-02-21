<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// CreateIssueSecuritySchemeDetailsDoc
final readonly class CreateIssueSecuritySchemeDetails extends Dto
{
    public function __construct(
        /**
         * The name of the issue security scheme.
         * Must be unique (case-insensitive).
         */
        public string $name,

        /** The description of the issue security scheme. */
        public ?string $description = null,

        /**
         * The list of scheme levels which should be added to the security scheme.
         * 
         * @var ?list<SecuritySchemeLevelBean>
         */
        public ?array $levels = null,
    ) {
    }
}
