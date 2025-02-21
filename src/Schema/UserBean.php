<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UserBeanDoc
final readonly class UserBean extends Dto
{
    public function __construct(
        /**
         * The account ID of the user, which uniquely identifies the user across all Atlassian products.
         * For example, *5b10ac8d82e05b22cc7d4ef5*.
         */
        public ?string $accountId = null,

        /** Whether the user is active. */
        public ?bool $active = null,

        /** The avatars of the user. */
        public ?UserBeanAvatarUrls $avatarUrls = null,

        /**
         * The display name of the user.
         * Depending on the user’s privacy setting, this may return an alternative value.
         */
        public ?string $displayName = null,

        /**
         * This property is deprecated in favor of `accountId` because of privacy changes.
         * See the "migration guide" for details.
         *  
         * The key of the user.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $key = null,

        /**
         * This property is deprecated in favor of `accountId` because of privacy changes.
         * See the "migration guide" for details.
         *  
         * The username of the user.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $name = null,

        /** The URL of the user. */
        public ?string $self = null,
    ) {
    }
}
