<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UserDoc
final readonly class User extends Dto
{
    public function __construct(
        /**
         * The account ID of the user, which uniquely identifies the user across all Atlassian products.
         * For example, *5b10ac8d82e05b22cc7d4ef5*.
         * Required in requests.
         */
        public ?string $accountId = null,

        /**
         * The user account type.
         * Can take the following values:
         * 
         *  - `atlassian` regular Atlassian user account
         *  - `app` system account used for Connect applications and OAuth to represent external systems
         *  - `customer` Jira Service Desk account representing an external service desk
         * 
         * @var 'atlassian'|'app'|'customer'|'unknown'|null
         */
        public ?string $accountType = null,

        /** Whether the user is active. */
        public ?bool $active = null,

        /** The application roles the user is assigned to. */
        public ?SimpleListWrapperApplicationRole $applicationRoles = null,

        /** The avatars of the user. */
        public ?AvatarUrlsBean $avatarUrls = null,

        /**
         * The display name of the user.
         * Depending on the user’s privacy setting, this may return an alternative value.
         */
        public ?string $displayName = null,

        /**
         * The email address of the user.
         * Depending on the user’s privacy setting, this may be returned as null.
         */
        public ?string $emailAddress = null,

        /** Expand options that include additional user details in the response. */
        public ?string $expand = null,

        /** The groups that the user belongs to. */
        public ?SimpleListWrapperGroupName $groups = null,

        /**
         * This property is no longer available and will be removed from the documentation soon.
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $key = null,

        /**
         * The locale of the user.
         * Depending on the user’s privacy setting, this may be returned as null.
         */
        public ?string $locale = null,

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
         * Depending on the user’s privacy setting, this may be returned as null.
         */
        public ?string $timeZone = null,
    ) {
    }
}
