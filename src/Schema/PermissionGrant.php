<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about a permission granted to a user or group. */
final readonly class PermissionGrant extends Dto
{
    public function __construct(
        /**
         * The user or group being granted the permission.
         * It consists of a `type`, a type-dependent `parameter` and a type-dependent `value`.
         * See "Holder object" in *Get all permission schemes* for more information.
         * 
         * @link ../api-group-permission-schemes/#holder-object
         */
        public ?PermissionHolder $holder = null,

        /** The ID of the permission granted details. */
        public ?int $id = null,

        /**
         * The permission to grant.
         * This permission can be one of the built-in permissions or a custom permission added by an app.
         * See "Built-in permissions" in *Get all permission schemes* for more information about the built-in permissions.
         * See the "project permission" and "global permission" module documentation for more information about custom permissions.
         * 
         * @link ../api-group-permission-schemes/#built-in-permissions
         * @link https://developer.atlassian.com/cloud/jira/platform/modules/project-permission/
         * @link https://developer.atlassian.com/cloud/jira/platform/modules/global-permission/
         */
        public ?string $permission = null,

        /** The URL of the permission granted details. */
        public ?string $self = null,
    ) {
    }
}
