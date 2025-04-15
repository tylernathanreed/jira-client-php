<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The payload for defining quick filters */
final readonly class QuickFilterPayload extends Dto
{
    public function __construct(
        /** The description of the quick filter */
        public ?string $description = null,

        /** The jql query for the quick filter */
        public ?string $jqlQuery = null,

        /** The name of the quick filter */
        public ?string $name = null,
    ) {
    }
}
