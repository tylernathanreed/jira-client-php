<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * A "user" specified as an Atlassian account ID.
 * 
 * @link https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user
 */
final class UserContextVariable extends Dto
{
    public function __construct(
        /** The account ID of the user. */
        public string $accountId,

        /** Type of custom context variable. */
        public string $type,
    ) {
    }
}
