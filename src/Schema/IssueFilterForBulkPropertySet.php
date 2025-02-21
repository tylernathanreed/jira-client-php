<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Bulk operation filter details. */
final readonly class IssueFilterForBulkPropertySet extends Dto
{
    public function __construct(
        /** The value of properties to perform the bulk operation on. */
        public mixed $currentValue = null,

        /**
         * List of issues to perform the bulk operation on.
         * 
         * @var ?list<int>
         */
        public ?array $entityIds = null,

        /** Whether the bulk operation occurs only when the property is present on or absent from an issue. */
        public ?bool $hasProperty = null,
    ) {
    }
}
