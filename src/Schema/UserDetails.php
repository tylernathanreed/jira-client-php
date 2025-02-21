<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UserDetailsDoc
final readonly class UserDetails extends Dto
{
    public function __construct(
        /**
         * The account ID of the user, which uniquely identifies the user across all Atlassian products.
         * For example, *5b10ac8d82e05b22cc7d4ef5*.
         */
        public ?string $accountId = null,

        /**
         * The type of account represented by this user.
         * This will be one of 'atlassian' (normal users), 'app' (application user) or 'customer' (Jira Service Desk customer user)
         */
        public ?string $accountType = null,

        /** Whether the user is active. */
        public ?bool $active = null,

        /** The avatars of the user. */
        public ?AvatarUrlsBean $avatarUrls = null,

        /**
         * The display name of the user.
         * Depending on the user’s privacy settings, this may return an alternative value.
         */
        public ?string $displayName = null,

        /**
         * The email address of the user.
         * Depending on the user’s privacy settings, this may be returned as null.
         */
        public ?string $emailAddress = null,

        /**
         * This property is no longer available and will be removed from the documentation soon.
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $key = null,

        /**
         * This property is no longer available and will be removed from the documentation soon.
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $name = null,

        /** The URL of the user. */
        public ?string $self = null,

        /**
         * The time zone specified in the user's profile.
         * Depending on the user’s privacy settings, this may be returned as null.
         */
        public ?string $timeZone = null,
    ) {
    }
}
