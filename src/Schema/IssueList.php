<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueListDoc
final readonly class IssueList extends Dto
{
    public function __construct(
        /**
         * The list of issue IDs.
         * 
         * @var list<string>
         */
        public array $issueIds,
    ) {
    }
}
