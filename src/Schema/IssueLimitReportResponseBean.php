<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// IssueLimitReportResponseBeanDoc
final readonly class IssueLimitReportResponseBean extends Dto
{
    public function __construct(
        /**
         * A list of ids of issues approaching the limit and their field count
         * 
         * @var array<string,object>
         */
        public ?array $issuesApproachingLimit = null,

        /**
         * A list of ids of issues breaching the limit and their field count
         * 
         * @var array<string,object>
         */
        public ?array $issuesBreachingLimit = null,

        /**
         * The fields and their defined limits
         * 
         * @var array<string,integer>
         */
        public ?array $limits = null,
    ) {
    }
}
