<?php

namespace Jira\Client\Schema;

use Reedware\OpenApi\Client\Dto;

/**
 * The payload for creating a security scheme.
 * See https://support.atlassian.com/jira-cloud-administration/docs/configure-issue-security-schemes/
 */
final readonly class SecuritySchemePayload extends Dto
{
    public function __construct(
        /**
         * The description of the security scheme
         * 
         * @example 'Newly created issue security scheme'
         */
        public ?string $description = null,

        /**
         * The name of the security scheme
         * 
         * @example 'New Security Scheme'
         */
        public ?string $name = null,

        public ?ProjectCreateResourceIdentifier $pcri = null,

        /**
         * The security levels for the security scheme
         * 
         * @var ?list<SecurityLevelPayload>
         */
        public ?array $securityLevels = null,
    ) {
    }
}
