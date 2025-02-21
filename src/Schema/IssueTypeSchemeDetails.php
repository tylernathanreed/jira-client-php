<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of an issue type scheme and its associated issue types. */
final readonly class IssueTypeSchemeDetails extends Dto
{
    public function __construct(
        /**
         * The list of issue types IDs of the issue type scheme.
         * At least one standard issue type ID is required.
         * 
         * @var list<string>
         */
        public array $issueTypeIds,

        /**
         * The name of the issue type scheme.
         * The name must be unique.
         * The maximum length is 255 characters.
         */
        public string $name,

        /**
         * The ID of the default issue type of the issue type scheme.
         * This ID must be included in `issueTypeIds`.
         */
        public ?string $defaultIssueTypeId = null,

        /**
         * The description of the issue type scheme.
         * The maximum length is 4000 characters.
         */
        public ?string $description = null,
    ) {
    }
}
