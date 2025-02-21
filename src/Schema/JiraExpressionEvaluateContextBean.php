<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

final readonly class JiraExpressionEvaluateContextBean extends Dto
{
    public function __construct(
        /** The ID of the board that is available under the `board` variable when evaluating the expression. */
        public ?int $board = null,

        /**
         * Custom context variables and their types.
         * These variable types are available for use in a custom context:
         * 
         *  - `user`: A "user" specified as an Atlassian account ID
         *  - `issue`: An "issue" specified by ID or key.
         * All the fields of the issue object are available in the Jira expression
         *  - `json`: A JSON object containing custom content
         *  - `list`: A JSON list of `user`, `issue`, or `json` variable types.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
         * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
         * 
         * @var ?list<CustomContextVariable>
         */
        public ?array $custom = null,

        /**
         * The ID of the customer request that is available under the `customerRequest` variable when evaluating the expression.
         * This is the same as the ID of the underlying Jira issue, but the customer request context variable will have a different type.
         */
        public ?int $customerRequest = null,

        /** The issue that is available under the `issue` variable when evaluating the expression. */
        public ?IdOrKeyBean $issue = null,

        /** The collection of issues that is available under the `issues` variable when evaluating the expression. */
        public ?JexpEvaluateCtxIssues $issues = null,

        /** The project that is available under the `project` variable when evaluating the expression. */
        public ?IdOrKeyBean $project = null,

        /** The ID of the service desk that is available under the `serviceDesk` variable when evaluating the expression. */
        public ?int $serviceDesk = null,

        /** The ID of the sprint that is available under the `sprint` variable when evaluating the expression. */
        public ?int $sprint = null,
    ) {
    }
}
