<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** JQL queries that contained users that could not be found */
final class JQLQueryWithUnknownUsers extends Dto
{
    public function __construct(
        /** The converted query, with accountIDs instead of user identifiers, or 'unknown' for users that could not be found */
        public ?string $convertedQuery = null,

        /** The original query, for reference */
        public ?string $originalQuery = null,
    ) {
    }
}
