<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of project permissions and associated issues and projects to look up. */
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
