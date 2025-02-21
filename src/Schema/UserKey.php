<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// UserKeyDoc
final readonly class UserKey extends Dto
{
    public function __construct(
        /**
         * The account ID of the user, which uniquely identifies the user across all Atlassian products.
         * For example, *5b10ac8d82e05b22cc7d4ef5*.
         * Returns *unknown* if the record is deleted and corrupted, for example, as the result of a server import.
         */
        public ?string $accountId = null,

        /**
         * This property is no longer available and will be removed from the documentation soon.
         * See the "deprecation notice" for details.
         * 
         * @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/
         */
        public ?string $key = null,
    ) {
    }
}
