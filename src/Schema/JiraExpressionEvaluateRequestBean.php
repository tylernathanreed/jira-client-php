<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// JiraExpressionEvaluateRequestBeanDoc
final readonly class JiraExpressionEvaluateRequestBean extends Dto
{
    public function __construct(
        /**
         * The Jira expression to evaluate.
         * 
         * @example '{ key: issue.key, type: issue.issueType.name, links: issue.links.map(link => link.linkedIssue.id) }'
         */
        public string $expression,

        /** The context in which the Jira expression is evaluated. */
        public ?JiraExpressionEvaluateContextBean $context = null,
    ) {
    }
}
