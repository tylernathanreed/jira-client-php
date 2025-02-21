<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ArchivedIssuesFilterRequestDoc
final readonly class ArchivedIssuesFilterRequest extends Dto
{
    public function __construct(
        /**
         * List archived issues archived by a specified account ID.
         * 
         * @var ?list<string>
         */
        public ?array $archivedBy = null,

        public ?DateRangeFilterRequest $archivedDateRange = null,

        /**
         * List archived issues with a specified issue type ID.
         * 
         * @var ?list<string>
         */
        public ?array $issueTypes = null,

        /**
         * List archived issues with a specified project key.
         * 
         * @var ?list<string>
         */
        public ?array $projects = null,

        /**
         * List archived issues where the reporter is a specified account ID.
         * 
         * @var ?list<string>
         */
        public ?array $reporters = null,
    ) {
    }
}
