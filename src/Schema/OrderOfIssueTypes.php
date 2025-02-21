<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// OrderOfIssueTypesDoc
final readonly class OrderOfIssueTypes extends Dto
{
    public function __construct(
        /**
         * A list of the issue type IDs to move.
         * The order of the issue type IDs in the list is the order they are given after the move.
         * 
         * @var list<string>
         */
        public array $issueTypeIds,

        /**
         * The ID of the issue type to place the moved issue types after.
         * Required if `position` isn't provided.
         */
        public ?string $after = null,

        /**
         * The position the issue types should be moved to.
         * Required if `after` isn't provided.
         * 
         * @var 'First'|'Last'|null
         */
        public ?string $position = null,
    ) {
    }
}
