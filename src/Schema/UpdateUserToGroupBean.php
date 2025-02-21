<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UpdateUserToGroupBeanDoc
final readonly class UpdateUserToGroupBean extends Dto
{
    public function __construct(
        /**
         * The account ID of the user, which uniquely identifies the user across all Atlassian products.
         * For example, *5b10ac8d82e05b22cc7d4ef5*.
         */
        public ?string $accountId = null,

        /**
         * This property is no longer available.
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $name = null,
    ) {
    }
}
