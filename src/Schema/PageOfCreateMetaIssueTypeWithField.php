<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A page of CreateMetaIssueType with Field. */
final readonly class PageOfCreateMetaIssueTypeWithField extends Dto
{
    public function __construct(
        /**
         * The collection of FieldCreateMetaBeans.
         * 
         * @var ?list<FieldCreateMetadata>
         */
        public ?array $fields = null,

        /** The maximum number of items to return per page. */
        public ?int $maxResults = null,

        /** @var ?list<FieldCreateMetadata> */
        public ?array $results = null,

        /** The index of the first item returned. */
        public ?int $startAt = null,

        /** The total number of items in all pages. */
        public ?int $total = null,
    ) {
    }
}
