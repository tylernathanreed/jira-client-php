<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of how to filter and list search auto complete information. */
final readonly class SearchAutoCompleteFilter extends Dto
{
    public function __construct(
        /** Include collapsed fields for fields that have non-unique names. */
        public ?bool $includeCollapsedFields = false,

        /**
         * List of project IDs used to filter the visible field details returned.
         * 
         * @var ?list<int>
         */
        public ?array $projectIds = null,
    ) {
    }
}
