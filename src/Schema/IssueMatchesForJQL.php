<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** A list of the issues matched to a JQL query or details of errors encountered during matching. */
final readonly class IssueMatchesForJQL extends Dto
{
    public function __construct(
        /**
         * A list of errors.
         * 
         * @var list<string>
         */
        public array $errors,

        /**
         * A list of issue IDs.
         * 
         * @var list<int>
         */
        public array $matchedIssues,
    ) {
    }
}
