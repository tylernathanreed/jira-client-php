<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details about permissions. */
final readonly class Permissions extends Dto
{
    public function __construct(
        /** List of permissions. */
        public ?UserPermission $permissions = null,
    ) {
    }
}
