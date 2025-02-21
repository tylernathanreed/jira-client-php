<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a permission and its availability to a user. */
final readonly class UserPermission extends Dto
{
    public function __construct(
        /**
         * Indicate whether the permission key is deprecated.
         * Note that deprecated keys cannot be used in the `permissions parameter of Get my permissions.
         * Deprecated keys are not returned by Get all permissions.`
         */
        public ?bool $deprecatedKey = null,

        /** The description of the permission. */
        public ?string $description = null,

        /** Whether the permission is available to the user in the queried context. */
        public ?bool $havePermission = null,

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

        /** The name of the permission. */
        public ?string $name = null,

        /**
         * The type of the permission.
         * 
         * @var 'GLOBAL'|'PROJECT'|null
         */
        public ?string $type = null,
    ) {
    }
}
