<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraExpressionsComplexityValueBeanDoc
final readonly class JiraExpressionsComplexityValueBean extends Dto
{
    public function __construct(
        /**
         * The maximum allowed complexity.
         * The evaluation will fail if this value is exceeded.
         */
        public int $limit,

        /** The complexity value of the current expression. */
        public int $value,
    ) {
    }
}
