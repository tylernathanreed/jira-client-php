<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The JQL queries to be converted. */
final readonly class JQLPersonalDataMigrationRequest extends Dto
{
    public function __construct(
        /**
         * A list of queries with user identifiers.
         * Maximum of 100 queries.
         * 
         * @var ?list<string>
         */
        public ?array $queryStrings = null,
    ) {
    }
}
