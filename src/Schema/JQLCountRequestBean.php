<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JQLCountRequestBeanDoc
final readonly class JQLCountRequestBean extends Dto
{
    public function __construct(
        /**
         * A "JQL" expression.
         * For performance reasons, this parameter requires a bounded query.
         * A bounded query is a query with a search restriction.
         * 
         * @link https://confluence.atlassian.com/x/egORLQ
         */
        public ?string $jql = null,
    ) {
    }
}
