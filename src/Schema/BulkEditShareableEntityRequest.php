<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkEditShareableEntityRequestDoc
final readonly class BulkEditShareableEntityRequest extends Dto
{
    public function __construct(
        /**
         * Allowed action for bulk edit shareable entity
         * 
         * @var 'changeOwner'|'changePermission'|'addPermission'|'removePermission'
         */
        public string $action,

        /**
         * The id list of shareable entities to be changed.
         * 
         * @var list<int>
         */
        public array $entityIds,

        /** The details of change owner action. */
        public ?BulkChangeOwnerDetails $changeOwnerDetails = null,

        /** Whether the actions are executed by users with Administer Jira global permission. */
        public ?bool $extendAdminPermissions = null,

        /** The permission details to be changed. */
        public ?PermissionDetails $permissionDetails = null,
    ) {
    }
}
