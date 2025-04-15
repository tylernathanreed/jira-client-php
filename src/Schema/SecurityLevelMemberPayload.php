<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * The payload for creating a security level member.
 * See https://support.atlassian.com/jira-cloud-administration/docs/configure-issue-security-schemes/
 */
final readonly class SecurityLevelMemberPayload extends Dto
{
    public function __construct(
        /**
         * Defines the value associated with the type.
         * For reporter this would be \{"null"\}; for users this would be the names of specific users); for group this would be group names like \{"administrators", "jira-administrators", "jira-users"\}
         */
        public ?string $parameter = null,

        /**
         * The type of the security level member
         * 
         * @var 'group'|'reporter'|'users'|null
         */
        public ?string $type = null,
    ) {
    }
}
