<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// BulkProjectPermissionsDoc
final readonly class BulkProjectPermissions extends Dto
{
    public function __construct(
        /**
         * List of project permissions.
         * 
         * @var list<string>
         */
        public array $permissions,

        /**
         * List of issue IDs.
         * 
         * @var ?list<int>
         */
        public ?array $issues = null,

        /**
         * List of project IDs.
         * 
         * @var ?list<int>
         */
        public ?array $projects = null,
    ) {
    }
}
