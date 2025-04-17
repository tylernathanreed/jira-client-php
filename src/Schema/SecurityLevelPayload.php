<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/**
 * The payload for creating a security level.
 * See https://support.atlassian.com/jira-cloud-administration/docs/configure-issue-security-schemes/
 */
final class SecurityLevelPayload extends Dto
{
    public function __construct(
        /**
         * The description of the security level
         * 
         * @example 'Newly created issue security level'
         */
        public ?string $description = null,

        /** Whether the security level is default for the security scheme */
        public ?bool $isDefault = null,

        /**
         * The name of the security level
         * 
         * @example 'New Security Level'
         */
        public ?string $name = null,

        /**
         * The members of the security level
         * 
         * @var ?list<SecurityLevelMemberPayload>
         */
        public ?array $securityLevelMembers = null,
    ) {
    }
}
