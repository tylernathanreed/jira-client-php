<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

final class IssueLimitReportResponseBean extends Dto
{
    public function __construct(
        /**
         * A list of ids of issues approaching the limit and their field count
         * 
         * @var array<string,int>
         */
        public ?array $issuesApproachingLimit = null,

        /**
         * A list of ids of issues breaching the limit and their field count
         * 
         * @var array<string,int>
         */
        public ?array $issuesBreachingLimit = null,

        /**
         * The fields and their defined limits
         * 
         * @var array<string,int>
         */
        public ?array $limits = null,
    ) {
    }
}
