<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JExpEvaluateMetaDataBeanDoc
final readonly class JExpEvaluateMetaDataBean extends Dto
{
    public function __construct(
        /**
         * Contains information about the expression complexity.
         * For example, the number of steps it took to evaluate the expression.
         */
        public ?JiraExpressionsComplexityBean $complexity = null,

        /**
         * Contains information about the `issues` variable in the context.
         * For example, is the issues were loaded with JQL, information about the page will be included here.
         */
        public ?JExpEvaluateIssuesMetaBean $issues = null,
    ) {
    }
}
