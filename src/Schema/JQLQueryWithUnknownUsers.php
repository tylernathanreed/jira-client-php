<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** JQL queries that contained users that could not be found */
final readonly class JQLQueryWithUnknownUsers extends Dto
{
    public function __construct(
        /** The converted query, with accountIDs instead of user identifiers, or 'unknown' for users that could not be found */
        public ?string $convertedQuery = null,

        /** The original query, for reference */
        public ?string $originalQuery = null,
    ) {
    }
}
