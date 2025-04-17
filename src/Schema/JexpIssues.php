<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** The JQL specifying the issues available in the evaluated Jira expression under the `issues` context variable. */
final class JexpIssues extends Dto
{
    public function __construct(
        /** The JQL query that specifies the set of issues available in the Jira expression. */
        public ?JexpJqlIssues $jql = null,
    ) {
    }
}
