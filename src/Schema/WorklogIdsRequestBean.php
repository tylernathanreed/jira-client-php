<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class WorklogIdsRequestBean extends Dto
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
