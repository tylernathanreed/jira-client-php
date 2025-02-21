<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A page of projects. */
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
