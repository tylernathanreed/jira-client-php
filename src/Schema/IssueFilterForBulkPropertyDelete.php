<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueFilterForBulkPropertyDeleteDoc
final readonly class IssueFilterForBulkPropertyDelete extends Dto
{
    public function __construct(
        /** The value of properties to perform the bulk operation on. */
        public mixed $currentValue = null,

        /**
         * List of issues to perform the bulk delete operation on.
         * 
         * @var ?list<int>
         */
        public ?array $entityIds = null,
    ) {
    }
}
