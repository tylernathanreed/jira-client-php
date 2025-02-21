<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of all permission schemes. */
final readonly class PermissionSchemes extends Dto
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
