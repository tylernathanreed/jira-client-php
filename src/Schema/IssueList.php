<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/** A list of issue IDs. */
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
