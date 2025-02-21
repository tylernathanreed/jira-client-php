<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// PermissionsDoc
final readonly class Permissions extends Dto
{
    public function __construct(
        /** List of permissions. */
        public ?UserPermission $permissions = null,
    ) {
    }
}
