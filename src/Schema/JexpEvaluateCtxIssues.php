<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * The JQL specifying the issues available in the evaluated Jira expression under the `issues` context variable.
 * This bean will be replacing `JexpIssues` bean as part of new `evaluate` endpoint
 */
final readonly class JexpEvaluateCtxIssues extends Dto
{
    public function __construct(
        /** The JQL query that specifies the set of issues available in the Jira expression. */
        public ?JexpEvaluateCtxJqlIssues $jql = null,
    ) {
    }
}
