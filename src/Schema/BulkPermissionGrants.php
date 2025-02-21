<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of global and project permissions granted to the user. */
final readonly class BulkPermissionGrants extends Dto
{
    public function __construct(
        /**
         * List of permissions granted to the user.
         * 
         * @var list<string>
         */
        public array $globalPermissions,

        /**
         * List of project permissions and the projects and issues those permissions provide access to.
         * 
         * @var list<BulkProjectPermissionGrants>
         */
        public array $projectPermissions,
    ) {
    }
}
