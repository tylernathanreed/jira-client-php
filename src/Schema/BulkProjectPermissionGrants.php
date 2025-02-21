<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** List of project permissions and the projects and issues those permissions grant access to. */
final readonly class BulkProjectPermissionGrants extends Dto
{
    public function __construct(
        /**
         * IDs of the issues the user has the permission for.
         * 
         * @var list<int>
         */
        public array $issues,

        /** A project permission, */
        public string $permission,

        /**
         * IDs of the projects the user has the permission for.
         * 
         * @var list<int>
         */
        public array $projects,
    ) {
    }
}
