<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details for permissions of shareable entities */
final class PermissionDetails extends Dto
{
    public function __construct(
        /**
         * The edit permissions for the shareable entities.
         * 
         * @var list<SharePermission>
         */
        public array $editPermissions,

        /**
         * The share permissions for the shareable entities.
         * 
         * @var list<SharePermission>
         */
        public array $sharePermissions,
    ) {
    }
}
