<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class WorklogIdsRequestBean extends Dto
{
    public function __construct(
        /**
         * A list of worklog IDs.
         * 
         * @var list<int>
         */
        public array $ids,
    ) {
    }
}
