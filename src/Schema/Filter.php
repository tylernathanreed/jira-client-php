<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// FilterDoc
final readonly class Filter extends Dto
{
    public function __construct(
        /**
         * The name of the filter.
         * Must be unique.
         */
        public string $name,

        /**
         * \[Experimental\] Approximate last used time.
         * Returns the date and time when the filter was last used.
         * Returns `null` if the filter hasn't been used after tracking was enabled.
         * For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate.
         */
        public ?DateTimeImmutable $approximateLastUsed = null,

        /** A description of the filter. */
        public ?string $description = null,

        /**
         * The groups and projects that can edit the filter.
         * 
         * @var ?list<SharePermission>
         */
        public ?array $editPermissions = null,

        /** Whether the filter is selected as a favorite. */
        public ?bool $favourite = null,

        /** The count of how many users have selected this filter as a favorite, including the filter owner. */
        public ?int $favouritedCount = null,

        /** The unique identifier for the filter. */
        public ?string $id = null,

        /**
         * The JQL query for the filter.
         * For example, *project = SSP AND issuetype = Bug*.
         */
        public ?string $jql = null,

        /**
         * The user who owns the filter.
         * This is defaulted to the creator of the filter, however Jira administrators can change the owner of a shared filter in the admin settings.
         */
        public ?User $owner = null,

        /**
         * A URL to view the filter results in Jira, using the "Search for issues using JQL" operation with the filter's JQL string to return the filter results.
         * For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*.
         */
        public ?string $searchUrl = null,

        /** The URL of the filter. */
        public ?string $self = null,

        /**
         * The groups and projects that the filter is shared with.
         * 
         * @var ?list<SharePermission>
         */
        public ?array $sharePermissions = null,

        /**
         * A paginated list of the users that the filter is shared with.
         * This includes users that are members of the groups or can browse the projects that the filter is shared with.
         */
        public ?UserList $sharedUsers = null,

        /** A paginated list of the users that are subscribed to the filter. */
        public ?FilterSubscriptionsList $subscriptions = null,

        /**
         * A URL to view the filter results in Jira, using the ID of the filter.
         * For example, *https://your-domain.atlassian.net/issues/?filter=10100*.
         */
        public ?string $viewUrl = null,
    ) {
    }
}
