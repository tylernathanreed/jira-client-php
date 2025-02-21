<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of issues and JQL queries. */
final readonly class IssuesAndJQLQueries extends Dto
{
    public function __construct(
        /**
         * A list of issue IDs.
         * 
         * @var list<int>
         */
        public array $issueIds,

        /**
         * A list of JQL queries.
         * 
         * @var list<string>
         */
        public array $jqls,
    ) {
    }
}
