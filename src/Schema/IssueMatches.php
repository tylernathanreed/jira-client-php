<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** A list of matched issues or errors for each JQL query, in the order the JQL queries were passed. */
final readonly class IssueMatches extends Dto
{
    public function __construct(
        /** @var list<IssueMatchesForJQL> */
        public array $matches,
    ) {
    }
}
