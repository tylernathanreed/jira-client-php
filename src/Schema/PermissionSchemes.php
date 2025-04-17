<?php

namespace Jira\Client\Schema;

use Jira\Client\Http\Dto;

/** List of all permission schemes. */
final class PermissionSchemes extends Dto
{
    public function __construct(
        /**
         * Permission schemes list.
         * 
         * @var ?list<PermissionScheme>
         */
        public ?array $permissionSchemes = null,
    ) {
    }
}
