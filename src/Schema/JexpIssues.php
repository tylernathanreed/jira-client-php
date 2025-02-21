<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JexpIssuesDoc
final readonly class JexpIssues extends Dto
{
    public function __construct(
        /** The JQL query that specifies the set of issues available in the Jira expression. */
        public ?JexpJqlIssues $jql = null,
    ) {
    }
}
