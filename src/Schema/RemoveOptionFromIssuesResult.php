<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// RemoveOptionFromIssuesResultDoc
final readonly class RemoveOptionFromIssuesResult extends Dto
{
    public function __construct(
        /**
         * A collection of errors related to unchanged issues.
         * The collection size is limited, which means not all errors may be returned.
         */
        public ?SimpleErrorCollection $errors = null,

        /**
         * The IDs of the modified issues.
         * 
         * @var ?list<int>
         */
        public ?array $modifiedIssues = null,

        /**
         * The IDs of the unchanged issues, those issues where errors prevent modification.
         * 
         * @var ?list<int>
         */
        public ?array $unmodifiedIssues = null,
    ) {
    }
}
