<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of issue type IDs to be removed from the field configuration scheme. */
final readonly class IssueTypeIdsToRemove extends Dto
{
    public function __construct(
        /**
         * The list of issue type IDs.
         * Must contain unique values not longer than 255 characters and not be empty.
         * Maximum of 100 IDs.
         * 
         * @var list<string>
         */
        public array $issueTypeIds,
    ) {
    }
}
