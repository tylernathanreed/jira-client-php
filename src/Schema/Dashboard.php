<?php

namespace Jira\Client\Schema;

use Jira\Client\Dto;

// DashboardDoc
final readonly class Dashboard extends Dto
{
    public function __construct(
        /** The automatic refresh interval for the dashboard in milliseconds. */
        public ?int $automaticRefreshMs = null,

        public ?string $description = null,

        /**
         * The details of any edit share permissions for the dashboard.
         * 
         * @var ?list<SharePermission>
         */
        public ?array $editPermissions = null,

        /** The ID of the dashboard. */
        public ?string $id = null,

        /** Whether the dashboard is selected as a favorite by the user. */
        public ?bool $isFavourite = null,

        /** Whether the current user has permission to edit the dashboard. */
        public ?bool $isWritable = null,

        /** The name of the dashboard. */
        public ?string $name = null,

        /** The owner of the dashboard. */
        public ?UserBean $owner = null,

        /** The number of users who have this dashboard as a favorite. */
        public ?int $popularity = null,

        /** The rank of this dashboard. */
        public ?int $rank = null,

        /** The URL of these dashboard details. */
        public ?string $self = null,

        /**
         * The details of any view share permissions for the dashboard.
         * 
         * @var ?list<SharePermission>
         */
        public ?array $sharePermissions = null,

        /** Whether the current dashboard is system dashboard. */
        public ?bool $systemDashboard = null,

        /** The URL of the dashboard. */
        public ?string $view = null,
    ) {
    }
}
