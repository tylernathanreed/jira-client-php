<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkEditGetFieldsDoc
final readonly class BulkEditGetFields extends Dto
{
    public function __construct(
        /** The end cursor for use in pagination. */
        public ?string $endingBefore = null,

        /**
         * List of all the fields
         * 
         * @var ?list<IssueBulkEditField>
         */
        public ?array $fields = null,

        /** The start cursor for use in pagination. */
        public ?string $startingAfter = null,
    ) {
    }
}
