<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JexpEvaluateCtxIssuesDoc
final readonly class JexpEvaluateCtxIssues extends Dto
{
    public function __construct(
        /** The JQL query that specifies the set of issues available in the Jira expression. */
        public ?JexpEvaluateCtxJqlIssues $jql = null,
    ) {
    }
}
