<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** The user details. */
final readonly class NewUserDetails extends Dto
{
    public function __construct(
        /** The email address for the user. */
        public string $emailAddress,

        /**
         * Products the new user has access to.
         * Valid products are: jira-core, jira-servicedesk, jira-product-discovery, jira-software.
         * To create a user without product access, set this field to be an empty array.
         * 
         * @var list<string>
         */
        public array $products,

        /**
         * Deprecated, do not use.
         * 
         * @var ?list<string>
         */
        public ?array $applicationKeys = null,

        /**
         * This property is no longer available.
         * If the user has an Atlassian account, their display name is not changed.
         * If the user does not have an Atlassian account, they are sent an email asking them set up an account.
         */
        public ?string $displayName = null,

        /**
         * This property is no longer available.
         * See the "migration guide" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $key = null,

        /**
         * This property is no longer available.
         * See the "migration guide" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $name = null,

        /**
         * This property is no longer available.
         * If the user has an Atlassian account, their password is not changed.
         * If the user does not have an Atlassian account, they are sent an email asking them set up an account.
         */
        public ?string $password = null,

        /** The URL of the user. */
        public ?string $self = null,
    ) {
    }
}
