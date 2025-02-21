<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/**
 * User details permitted by the user's Atlassian Account privacy settings.
 * However, be aware of these exceptions:
 * 
 *  - User record deleted from Atlassian: This occurs as the result of a right to be forgotten request.
 * In this case, `displayName` provides an indication and other parameters have default values or are blank (for example, email is blank)
 *  - User record corrupted: This occurs as a results of events such as a server import and can only happen to deleted users.
 * In this case, `accountId` returns *unknown* and all other parameters have fallback values
 *  - User record unavailable: This usually occurs due to an internal service outage.
 * In this case, all parameters have fallback values.
 */
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
