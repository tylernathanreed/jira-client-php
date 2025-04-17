<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** Details about permissions. */
final class Permissions extends Dto
{
    public function __construct(
        /**
         * List of permissions.
         * 
         * @var array<string,UserPermission>
         */
        public ?array $permissions = null,
    ) {
    }
}
