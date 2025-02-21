<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details for permissions of shareable entities */
final readonly class PermissionDetails extends Dto
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
