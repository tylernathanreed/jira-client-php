<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The list of issue type IDs. */
final class IssueTypeIds extends Dto
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
