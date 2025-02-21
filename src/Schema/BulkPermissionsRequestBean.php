<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of global permissions to look up and project permissions with associated projects and issues to look up. */
final readonly class BulkPermissionsRequestBean extends Dto
{
    public function __construct(
        /** The account ID of a user. */
        public ?string $accountId = null,

        /**
         * Global permissions to look up.
         * 
         * @var ?list<string>
         */
        public ?array $globalPermissions = null,

        /**
         * Project permissions with associated projects and issues to look up.
         * 
         * @var ?list<BulkProjectPermissions>
         */
        public ?array $projectPermissions = null,
    ) {
    }
}
