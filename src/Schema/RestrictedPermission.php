<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// RestrictedPermissionDoc
final readonly class RestrictedPermission extends Dto
{
    public function __construct(
        /**
         * The ID of the permission.
         * Either `id` or `key` must be specified.
         * Use "Get all permissions" to get the list of permissions.
         */
        public ?string $id = null,

        /**
         * The key of the permission.
         * Either `id` or `key` must be specified.
         * Use "Get all permissions" to get the list of permissions.
         */
        public ?string $key = null,
    ) {
    }
}
