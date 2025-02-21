<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UserPickerUserDoc
final readonly class UserPickerUser extends Dto
{
    public function __construct(
        /**
         * The account ID of the user, which uniquely identifies the user across all Atlassian products.
         * For example, *5b10ac8d82e05b22cc7d4ef5*.
         */
        public ?string $accountId = null,

        /** The avatar URL of the user. */
        public ?string $avatarUrl = null,

        /**
         * The display name of the user.
         * Depending on the user’s privacy setting, this may be returned as null.
         */
        public ?string $displayName = null,

        /** The display name, email address, and key of the user with the matched query string highlighted with the HTML bold tag. */
        public ?string $html = null,

        /**
         * This property is no longer available.
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $key = null,

        /**
         * This property is no longer available .
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $name = null,
    ) {
    }
}
