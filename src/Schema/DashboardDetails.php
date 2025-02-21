<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

/** Details of a dashboard. */
final readonly class DashboardDetails extends Dto
{
    public function __construct(
        /**
         * The edit permissions for the dashboard.
         * 
         * @var list<SharePermission>
         */
        public array $editPermissions,

        /** The name of the dashboard. */
        public string $name,

        /**
         * The share permissions for the dashboard.
         * 
         * @var list<SharePermission>
         */
        public array $sharePermissions,

        /** The description of the dashboard. */
        public ?string $description = null,
    ) {
    }
}
