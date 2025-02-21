<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The list of issue type IDs. */
final readonly class IssueTypeIds extends Dto
{
    public function __construct(
        /**
         * The list of issue type IDs.
         * 
         * @var list<string>
         */
        public array $issueTypeIds,
    ) {
    }
}
