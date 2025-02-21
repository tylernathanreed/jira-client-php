<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * An "issue" specified by ID or key.
 * All the fields of the issue object are available in the Jira expression.
 * 
 * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue
 */
final readonly class IssueContextVariable extends Dto
{
    public function __construct(
        /** Type of custom context variable. */
        public string $type,

        /** The issue ID. */
        public ?int $id = null,

        /** The issue key. */
        public ?string $key = null,
    ) {
    }
}
