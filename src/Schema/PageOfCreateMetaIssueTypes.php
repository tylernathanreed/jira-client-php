<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A page of CreateMetaIssueTypes. */
final readonly class PageOfCreateMetaIssueTypes extends Dto
{
    public function __construct(
        public ?array $createMetaIssueType = null,

        /**
         * The list of CreateMetaIssueType.
         * 
         * @var ?list<IssueTypeIssueCreateMetadata>
         */
        public ?array $issueTypes = null,

        /** The maximum number of items to return per page. */
        public ?int $maxResults = null,

        /** The index of the first item returned. */
        public ?int $startAt = null,

        /** The total number of items in all pages. */
        public ?int $total = null,
    ) {
    }
}
