<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * The JQL specifying the issues available in the evaluated Jira expression under the `issues` context variable.
 * Not all issues returned by the JQL query are loaded, only those described by the `startAt` and `maxResults` properties.
 * To determine whether it is necessary to iterate to ensure all the issues returned by the JQL query are evaluated, inspect `meta.issues.jql.count` in the response.
 */
final readonly class JexpJqlIssues extends Dto
{
    public function __construct(
        /**
         * The maximum number of issues to return from the JQL query.
         * Inspect `meta.issues.jql.maxResults` in the response to ensure the maximum value has not been exceeded.
         */
        public ?int $maxResults = null,

        /** The JQL query. */
        public ?string $query = null,

        /** The index of the first issue to return from the JQL query. */
        public ?int $startAt = null,

        /**
         * Determines how to validate the JQL query and treat the validation results.
         * 
         * @var 'strict'|'warn'|'none'|null
         */
        public ?string $validation = 'strict',
    ) {
    }
}
