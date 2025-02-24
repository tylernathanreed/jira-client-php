<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Filters
{
    /**
     * Creates a filter.
     * The filter is shared according to the "default share scope".
     * The filter is not selected as a favorite
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param string $expand Use "expand" to include additional information about filter in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `sharedUsers` Returns the users that the filter is shared with.
     *                       This includes users that can browse projects that the filter is shared with.
     *                       If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users.
     *                       The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`
     *                        - `subscriptions` Returns the users that are subscribed to the filter.
     *                       If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions.
     *                       The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * @param bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be created.
     *                                       Available to users with *Administer Jira* "global permission".
     *                                       @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createFilter(
        Schema\Filter $request,
        ?string $expand = null,
        ?bool $overrideSharePermissions = false,
    ): Schema\Filter {
        return $this->call(
            uri: '/rest/api/3/filter',
            method: 'post',
            body: $request,
            query: compact('expand', 'overrideSharePermissions'),
            success: 200,
            schema: Schema\Filter::class,
        );
    }

    /**
     * Returns the visible favorite filters of the user
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** A favorite filter is only visible to the user where the filter is:
     * 
     *  - owned by the user
     *  - shared with a group that the user is a member of
     *  - shared with a private project that the user has *Browse projects* "project permission" for
     *  - shared with a public project
     *  - shared with the public
     * 
     * For example, if the user favorites a public filter that is subsequently made private that filter is not returned by this operation.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $expand Use "expand" to include additional information about filter in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `sharedUsers` Returns the users that the filter is shared with.
     *                       This includes users that can browse projects that the filter is shared with.
     *                       If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users.
     *                       The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`
     *                        - `subscriptions` Returns the users that are subscribed to the filter.
     *                       If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions.
     *                       The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     */
    public function getFavouriteFilters(
        ?string $expand = null,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/favourite',
            method: 'get',
            query: compact('expand'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns the filters owned by the user.
     * If `includeFavourites` is `true`, the user's visible favorite filters are also returned
     * 
     * **"Permissions" required:** Permission to access Jira, however, a favorite filters is only visible to the user where the filter is:
     * 
     *  - owned by the user
     *  - shared with a group that the user is a member of
     *  - shared with a private project that the user has *Browse projects* "project permission" for
     *  - shared with a public project
     *  - shared with the public
     * 
     * For example, if the user favorites a public filter that is subsequently made private that filter is not returned by this operation.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $expand Use "expand" to include additional information about filter in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `sharedUsers` Returns the users that the filter is shared with.
     *                       This includes users that can browse projects that the filter is shared with.
     *                       If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users.
     *                       The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`
     *                        - `subscriptions` Returns the users that are subscribed to the filter.
     *                       If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions.
     *                       The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * @param bool $includeFavourites Include the user's favorite filters in the response.
     */
    public function getMyFilters(
        ?string $expand = null,
        ?bool $includeFavourites = false,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/my',
            method: 'get',
            query: compact('expand', 'includeFavourites'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Returns a "paginated" list of filters.
     * Use this operation to get:
     * 
     *  - specific filters, by defining `id` only
     *  - filters that match all of the specified attributes.
     * For example, all filters for a user with a particular word in their name.
     * When multiple attributes are specified only filters matching all attributes are returned
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None, however, only the following filters that match the query parameters are returned:
     * 
     *  - filters owned by the user
     *  - filters shared with a group that the user is a member of
     *  - filters shared with a private project that the user has *Browse projects* "project permission" for
     *  - filters shared with a public project
     *  - filters shared with the public.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param string $filterName String used to perform a case-insensitive partial match with `name`.
     * @param string $accountId User account ID used to return filters with the matching `owner.accountId`.
     *                          This parameter cannot be used with `owner`.
     * @param string $owner This parameter is deprecated because of privacy changes.
     *                      Use `accountId` instead.
     *                      See the "migration guide" for details.
     *                      User name used to return filters with the matching `owner.name`.
     *                      This parameter cannot be used with `accountId`.
     *                      @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     *                          Group name used to returns filters that are shared with a group that matches `sharePermissions.group.groupname`.
     *                          This parameter cannot be used with the `groupId` parameter.
     * @param string $groupId Group ID used to returns filters that are shared with a group that matches `sharePermissions.group.groupId`.
     *                        This parameter cannot be used with the `groupname` parameter.
     * @param int $projectId Project ID used to returns filters that are shared with a project that matches `sharePermissions.project.id`.
     * @param ?list<int> $id The list of filter IDs.
     *                       To include multiple IDs, provide an ampersand-separated list.
     *                       For example, `id=10000&id=10001`.
     *                       Do not exceed 200 filter IDs.
     * @param 'description'|'-description'|'+description'|'favourite_count'|'-favourite_count'|'+favourite_count'|'id'|'-id'|'+id'|'is_favourite'|'-is_favourite'|'+is_favourite'|'name'|'-name'|'+name'|'owner'|'-owner'|'+owner'|'is_shared'|'-is_shared'|'+is_shared'|null $orderBy
     *        "Order" the results by a field:
     *         - `description` Sorts by filter description.
     *        Note that this sorting works independently of whether the expand to display the description field is in use
     *         - `favourite_count` Sorts by the count of how many users have this filter as a favorite
     *         - `is_favourite` Sorts by whether the filter is marked as a favorite
     *         - `id` Sorts by filter ID
     *         - `name` Sorts by filter name
     *         - `owner` Sorts by the ID of the filter owner
     *         - `is_shared` Sorts by whether the filter is shared.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param string $expand Use "expand" to include additional information about filter in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `description` Returns the description of the filter
     *                        - `favourite` Returns an indicator of whether the user has set the filter as a favorite
     *                        - `favouritedCount` Returns a count of how many users have set this filter as a favorite
     *                        - `jql` Returns the JQL query that the filter uses
     *                        - `owner` Returns the owner of the filter
     *                        - `searchUrl` Returns a URL to perform the filter's JQL query
     *                        - `sharePermissions` Returns the share permissions defined for the filter
     *                        - `editPermissions` Returns the edit permissions defined for the filter
     *                        - `isWritable` Returns whether the current user has permission to edit the filter
     *                        - `approximateLastUsed` \[Experimental\] Returns the approximate date and time when the filter was last evaluated
     *                        - `subscriptions` Returns the users that are subscribed to the filter
     *                        - `viewUrl` Returns a URL to view the filter.
     * @param bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be returned.
     *                                       Available to users with *Administer Jira* "global permission".
     *                                       @link https://confluence.atlassian.com/x/x4dKLg
     * @param bool $isSubstringMatch When `true` this will perform a case-insensitive substring match for the provided `filterName`.
     *                               When `false` the filter name will be searched using "full text search syntax".
     *                               @link https://support.atlassian.com/jira-software-cloud/docs/search-for-issues-using-the-text-field
     */
    public function getFiltersPaginated(
        ?string $filterName = null,
        ?string $accountId = null,
        ?string $owner = null,
        ?string $groupname = null,
        ?string $groupId = null,
        ?int $projectId = null,
        ?array $id = null,
        ?string $orderBy = 'name',
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $expand = null,
        ?bool $overrideSharePermissions = false,
        ?bool $isSubstringMatch = false,
    ): Schema\PageBeanFilterDetails {
        return $this->call(
            uri: '/rest/api/3/filter/search',
            method: 'get',
            query: compact('filterName', 'accountId', 'owner', 'groupname', 'groupId', 'projectId', 'id', 'orderBy', 'startAt', 'maxResults', 'expand', 'overrideSharePermissions', 'isSubstringMatch'),
            success: 200,
            schema: Schema\PageBeanFilterDetails::class,
        );
    }

    /**
     * Returns a filter
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None, however, the filter is only returned where it is:
     * 
     *  - owned by the user
     *  - shared with a group that the user is a member of
     *  - shared with a private project that the user has *Browse projects* "project permission" for
     *  - shared with a public project
     *  - shared with the public.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $id The ID of the filter to return.
     * @param string $expand Use "expand" to include additional information about filter in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `sharedUsers` Returns the users that the filter is shared with.
     *                       This includes users that can browse projects that the filter is shared with.
     *                       If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users.
     *                       The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`
     *                        - `subscriptions` Returns the users that are subscribed to the filter.
     *                       If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions.
     *                       The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * @param bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be returned.
     *                                       Available to users with *Administer Jira* "global permission".
     *                                       @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function getFilter(
        int $id,
        ?string $expand = null,
        ?bool $overrideSharePermissions = false,
    ): Schema\Filter {
        return $this->call(
            uri: '/rest/api/3/filter/{id}',
            method: 'get',
            query: compact('expand', 'overrideSharePermissions'),
            path: compact('id'),
            success: 200,
            schema: Schema\Filter::class,
        );
    }

    /**
     * Updates a filter.
     * Use this operation to update a filter's name, description, JQL, or sharing
     * 
     * **"Permissions" required:** Permission to access Jira, however the user must own the filter.
     * 
     * @param int $id The ID of the filter to update.
     * @param string $expand Use "expand" to include additional information about filter in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `sharedUsers` Returns the users that the filter is shared with.
     *                       This includes users that can browse projects that the filter is shared with.
     *                       If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users.
     *                       The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`
     *                        - `subscriptions` Returns the users that are subscribed to the filter.
     *                       If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions.
     *                       The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * @param bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable the addition of any share permissions to filters.
     *                                       Available to users with *Administer Jira* "global permission".
     *                                       @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function updateFilter(
        Schema\Filter $request,
        int $id,
        ?string $expand = null,
        ?bool $overrideSharePermissions = false,
    ): Schema\Filter {
        return $this->call(
            uri: '/rest/api/3/filter/{id}',
            method: 'put',
            body: $request,
            query: compact('expand', 'overrideSharePermissions'),
            path: compact('id'),
            success: 200,
            schema: Schema\Filter::class,
        );
    }

    /**
     * Delete a filter
     * 
     * **"Permissions" required:** Permission to access Jira, however filters can only be deleted by the creator of the filter or a user with *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the filter to delete.
     */
    public function deleteFilter(
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/{id}',
            method: 'delete',
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the columns configured for a filter.
     * The column configuration is used when the filter's results are viewed in *List View* with the *Columns* set to *Filter*
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None, however, column details are only returned for:
     * 
     *  - filters owned by the user
     *  - filters shared with a group that the user is a member of
     *  - filters shared with a private project that the user has *Browse projects* "project permission" for
     *  - filters shared with a public project
     *  - filters shared with the public.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $id The ID of the filter.
     */
    public function getColumns(
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/columns',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Sets the columns for a filter.
     * Only navigable fields can be set as columns.
     * Use "Get fields" to get the list fields in Jira.
     * A navigable field has `navigable` set to `true`
     * 
     * The parameters for this resource are expressed as HTML form data.
     * For example, in curl:
     * 
     * `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/filter/10000/columns`
     * 
     * **"Permissions" required:** Permission to access Jira, however, columns are only set for:
     * 
     *  - filters owned by the user
     *  - filters shared with a group that the user is a member of
     *  - filters shared with a private project that the user has *Browse projects* "project permission" for
     *  - filters shared with a public project
     *  - filters shared with the public.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $id The ID of the filter.
     */
    public function setColumns(
        Schema\ColumnRequestBody $request,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/columns',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Reset the user's column configuration for the filter to the default
     * 
     * **"Permissions" required:** Permission to access Jira, however, columns are only reset for:
     * 
     *  - filters owned by the user
     *  - filters shared with a group that the user is a member of
     *  - filters shared with a private project that the user has *Browse projects* "project permission" for
     *  - filters shared with a public project
     *  - filters shared with the public.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $id The ID of the filter.
     */
    public function resetColumns(
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/columns',
            method: 'delete',
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Add a filter as a favorite for the user
     * 
     * **"Permissions" required:** Permission to access Jira, however, the user can only favorite:
     * 
     *  - filters owned by the user
     *  - filters shared with a group that the user is a member of
     *  - filters shared with a private project that the user has *Browse projects* "project permission" for
     *  - filters shared with a public project
     *  - filters shared with the public.
     * 
     * @link https://confluence.atlassian.com/x/yodKLg
     * 
     * @param int $id The ID of the filter.
     * @param string $expand Use "expand" to include additional information about filter in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `sharedUsers` Returns the users that the filter is shared with.
     *                       This includes users that can browse projects that the filter is shared with.
     *                       If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users.
     *                       The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`
     *                        - `subscriptions` Returns the users that are subscribed to the filter.
     *                       If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions.
     *                       The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     */
    public function setFavouriteForFilter(
        int $id,
        ?string $expand = null,
    ): Schema\Filter {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/favourite',
            method: 'put',
            query: compact('expand'),
            path: compact('id'),
            success: 200,
            schema: Schema\Filter::class,
        );
    }

    /**
     * Removes a filter as a favorite for the user.
     * Note that this operation only removes filters visible to the user from the user's favorites list.
     * For example, if the user favorites a public filter that is subsequently made private (and is therefore no longer visible on their favorites list) they cannot remove it from their favorites list
     * 
     * **"Permissions" required:** Permission to access Jira.
     * 
     * @param int $id The ID of the filter.
     * @param string $expand Use "expand" to include additional information about filter in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `sharedUsers` Returns the users that the filter is shared with.
     *                       This includes users that can browse projects that the filter is shared with.
     *                       If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users.
     *                       The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`
     *                        - `subscriptions` Returns the users that are subscribed to the filter.
     *                       If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions.
     *                       The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request.
     *                       For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     */
    public function deleteFavouriteForFilter(
        int $id,
        ?string $expand = null,
    ): Schema\Filter {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/favourite',
            method: 'delete',
            query: compact('expand'),
            path: compact('id'),
            success: 200,
            schema: Schema\Filter::class,
        );
    }

    /**
     * Changes the owner of the filter
     * 
     * **"Permissions" required:** Permission to access Jira.
     * However, the user must own the filter or have the *Administer Jira* "global permission".
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param int $id The ID of the filter to update.
     */
    public function changeFilterOwner(
        Schema\ChangeFilterOwner $request,
        int $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/filter/{id}/owner',
            method: 'put',
            body: $request,
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }
}
