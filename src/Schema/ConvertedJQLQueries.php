<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// ConvertedJQLQueriesDoc
final readonly class ConvertedJQLQueries extends Dto
{
    public function __construct(
        /**
         * List of queries containing user information that could not be mapped to an existing user
         * 
         * @var ?list<JQLQueryWithUnknownUsers>
         */
        public ?array $queriesWithUnknownUsers = null,

        /**
         * The list of converted query strings with account IDs in place of user identifiers.
         * 
         * @var ?list<string>
         */
        public ?array $queryStrings = null,
    ) {
    }
}
