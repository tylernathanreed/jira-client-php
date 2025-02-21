<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// StatusProjectUsagePageDoc
final readonly class StatusProjectUsagePage extends Dto
{
    public function __construct(
        /** Page token for the next page of issue type usages. */
        public ?string $nextPageToken = null,

        /**
         * The list of projects.
         * 
         * @var ?list<StatusProjectUsage>
         */
        public ?array $values = null,
    ) {
    }
}
