<?php

namespace Jira\Client\Schema;

use DateTimeImmutable;
use Jira\Client\Dto;

// FilterDetailsDoc
final readonly class FilterDetails extends Dto
{
    public function __construct(
        /** The name of the filter. */
        public string $name,

        /**
         * \[Experimental\] Approximate last used time.
         * Returns the date and time when the filter was last used.
         * Returns `null` if the filter hasn't been used after tracking was enabled.
         * For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate.
         */
        public ?DateTimeImmutable $approximateLastUsed = null,

        /** The description of the filter. */
        public ?string $description = null,

        /**
         * The groups and projects that can edit the filter.
         * This can be specified when updating a filter, but not when creating a filter.
         * 
         * @var ?list<SharePermission>
         */
        public ?array $editPermissions = null,

        /** Expand options that include additional filter details in the response. */
        public ?string $expand = null,

        /** Whether the filter is selected as a favorite by any users, not including the filter owner. */
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
         * Defaults to the creator of the filter, however, Jira administrators can change the owner of a shared filter in the admin settings.
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
         * This can be specified when updating a filter, but not when creating a filter.
         * 
         * @var ?list<SharePermission>
         */
        public ?array $sharePermissions = null,

        /**
         * The users that are subscribed to the filter.
         * 
         * @var ?list<FilterSubscription>
         */
        public ?array $subscriptions = null,

        /**
         * A URL to view the filter results in Jira, using the ID of the filter.
         * For example, *https://your-domain.atlassian.net/issues/?filter=10100*.
         */
        public ?string $viewUrl = null,
    ) {
    }
}
