<?php

namespace Jira\Client\Operations;

use Jira\Client\Client;
use Jira\Client\Schema;

/** @phpstan-require-extends Client */
trait Dashboards
{
    /**
     * Returns a list of dashboards owned by or shared with the user.
     * The list may be filtered to include only favorite or owned dashboards
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @param 'my'|'favourite'|null $filter
     *        The filter applied to the list of dashboards.
     *        Valid values are:
     *         - `favourite` Returns dashboards the user has marked as favorite
     *         - `my` Returns dashboards owned by the user.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     */
    public function getAllDashboards(
        ?string $filter = null,
        ?int $startAt = 0,
        ?int $maxResults = 20,
    ): Schema\PageOfDashboards {
        return $this->call(
            uri: '/rest/api/3/dashboard',
            method: 'get',
            query: compact('filter', 'startAt', 'maxResults'),
            success: 200,
            schema: Schema\PageOfDashboards::class,
        );
    }

    /**
     * Creates a dashboard
     * 
     * **"Permissions" required:** None.
     * 
     * @param bool $extendAdminPermissions Whether admin level permissions are used.
     *                                     It should only be true if the user has *Administer Jira* "global permission"
     *                                     @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function createDashboard(
        Schema\DashboardDetails $request,
        ?bool $extendAdminPermissions = false,
    ): Schema\Dashboard {
        return $this->call(
            uri: '/rest/api/3/dashboard',
            method: 'post',
            body: $request,
            query: compact('extendAdminPermissions'),
            success: 200,
            schema: Schema\Dashboard::class,
        );
    }

    /**
     * Bulk edit dashboards.
     * Maximum number of dashboards to be edited at the same time is 100
     * 
     * **"Permissions" required:** None
     * 
     * The dashboards to be updated must be owned by the user, or the user must be an administrator.
     */
    public function bulkEditDashboards(
        Schema\BulkEditShareableEntityRequest $request,
    ): Schema\BulkEditShareableEntityResponse {
        return $this->call(
            uri: '/rest/api/3/dashboard/bulk/edit',
            method: 'put',
            body: $request,
            success: 200,
            schema: Schema\BulkEditShareableEntityResponse::class,
        );
    }

    /**
     * Gets a list of all available gadgets that can be added to all dashboards
     * 
     * **"Permissions" required:** None.
     */
    public function getAllAvailableDashboardGadgets(): Schema\AvailableDashboardGadgetsResponse
    {
        return $this->call(
            uri: '/rest/api/3/dashboard/gadgets',
            method: 'get',
            success: 200,
            schema: Schema\AvailableDashboardGadgetsResponse::class,
        );
    }

    /**
     * Returns a "paginated" list of dashboards.
     * This operation is similar to "Get dashboards" except that the results can be refined to include dashboards that have specific attributes.
     * For example, dashboards with a particular name.
     * When multiple attributes are specified only filters matching all attributes are returned
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** The following dashboards that match the query parameters are returned:
     * 
     *  - Dashboards owned by the user.
     * Not returned for anonymous users
     *  - Dashboards shared with a group that the user is a member of.
     * Not returned for anonymous users
     *  - Dashboards shared with a private project that the user can browse.
     * Not returned for anonymous users
     *  - Dashboards shared with a public project
     *  - Dashboards shared with the public.
     * 
     * @param string $dashboardName String used to perform a case-insensitive partial match with `name`.
     * @param string $accountId User account ID used to return dashboards with the matching `owner.accountId`.
     *                          This parameter cannot be used with the `owner` parameter.
     * @param string $owner This parameter is deprecated because of privacy changes.
     *                      Use `accountId` instead.
     *                      See the "migration guide" for details.
     *                      User name used to return dashboards with the matching `owner.name`.
     *                      This parameter cannot be used with the `accountId` parameter.
     *                      @link https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide
     * @param string $groupname As a group's name can change, use of `groupId` is recommended.
     *                          Group name used to return dashboards that are shared with a group that matches `sharePermissions.group.name`.
     *                          This parameter cannot be used with the `groupId` parameter.
     * @param string $groupId Group ID used to return dashboards that are shared with a group that matches `sharePermissions.group.groupId`.
     *                        This parameter cannot be used with the `groupname` parameter.
     * @param int $projectId Project ID used to returns dashboards that are shared with a project that matches `sharePermissions.project.id`.
     * @param 'description'|'-description'|'+description'|'favorite_count'|'-favorite_count'|'+favorite_count'|'id'|'-id'|'+id'|'is_favorite'|'-is_favorite'|'+is_favorite'|'name'|'-name'|'+name'|'owner'|'-owner'|'+owner'|null $orderBy
     *        "Order" the results by a field:
     *         - `description` Sorts by dashboard description.
     *        Note that this sort works independently of whether the expand to display the description field is in use
     *         - `favourite_count` Sorts by dashboard popularity
     *         - `id` Sorts by dashboard ID
     *         - `is_favourite` Sorts by whether the dashboard is marked as a favorite
     *         - `name` Sorts by dashboard name
     *         - `owner` Sorts by dashboard owner name.
     * @param int $startAt The index of the first item to return in a page of results (page offset).
     * @param int $maxResults The maximum number of items to return per page.
     * @param 'active'|'archived'|'deleted'|null $status
     *        The status to filter by.
     *        It may be active, archived or deleted.
     * @param string $expand Use "expand" to include additional information about dashboard in the response.
     *                       This parameter accepts a comma-separated list.
     *                       Expand options include:
     *                        - `description` Returns the description of the dashboard
     *                        - `owner` Returns the owner of the dashboard
     *                        - `viewUrl` Returns the URL that is used to view the dashboard
     *                        - `favourite` Returns `isFavourite`, an indicator of whether the user has set the dashboard as a favorite
     *                        - `favouritedCount` Returns `popularity`, a count of how many users have set this dashboard as a favorite
     *                        - `sharePermissions` Returns details of the share permissions defined for the dashboard
     *                        - `editPermissions` Returns details of the edit permissions defined for the dashboard
     *                        - `isWritable` Returns whether the current user has permission to edit the dashboard.
     */
    public function getDashboardsPaginated(
        ?string $dashboardName = null,
        ?string $accountId = null,
        ?string $owner = null,
        ?string $groupname = null,
        ?string $groupId = null,
        ?int $projectId = null,
        ?string $orderBy = 'name',
        ?int $startAt = 0,
        ?int $maxResults = 50,
        ?string $status = 'active',
        ?string $expand = null,
    ): Schema\PageBeanDashboard {
        return $this->call(
            uri: '/rest/api/3/dashboard/search',
            method: 'get',
            query: compact('dashboardName', 'accountId', 'owner', 'groupname', 'groupId', 'projectId', 'orderBy', 'startAt', 'maxResults', 'status', 'expand'),
            success: 200,
            schema: Schema\PageBeanDashboard::class,
        );
    }

    /**
     * Returns a list of dashboard gadgets on a dashboard
     * 
     * This operation returns:
     * 
     *  - Gadgets from a list of IDs, when `id` is set
     *  - Gadgets with a module key, when `moduleKey` is set
     *  - Gadgets from a list of URIs, when `uri` is set
     *  - All gadgets, when no other parameters are set
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None.
     * 
     * @param int $dashboardId The ID of the dashboard.
     * @param ?list<string> $moduleKey The list of gadgets module keys.
     *                                 To include multiple module keys, separate module keys with ampersand: `moduleKey=key:one&moduleKey=key:two`.
     * @param ?list<string> $uri The list of gadgets URIs.
     *                           To include multiple URIs, separate URIs with ampersand: `uri=/rest/example/uri/1&uri=/rest/example/uri/2`.
     * @param ?list<int> $gadgetId The list of gadgets IDs.
     *                             To include multiple IDs, separate IDs with ampersand: `gadgetId=10000&gadgetId=10001`.
     */
    public function getAllGadgets(
        int $dashboardId,
        ?array $moduleKey = null,
        ?array $uri = null,
        ?array $gadgetId = null,
    ): Schema\DashboardGadgetResponse {
        return $this->call(
            uri: '/rest/api/3/dashboard/{dashboardId}/gadget',
            method: 'get',
            query: compact('moduleKey', 'uri', 'gadgetId'),
            path: compact('dashboardId'),
            success: 200,
            schema: Schema\DashboardGadgetResponse::class,
        );
    }

    /**
     * Adds a gadget to a dashboard
     * 
     * **"Permissions" required:** None.
     * 
     * @param int $dashboardId The ID of the dashboard.
     */
    public function addGadget(
        Schema\DashboardGadgetSettings $request,
        int $dashboardId,
    ): Schema\DashboardGadget {
        return $this->call(
            uri: '/rest/api/3/dashboard/{dashboardId}/gadget',
            method: 'post',
            body: $request,
            path: compact('dashboardId'),
            success: 200,
            schema: Schema\DashboardGadget::class,
        );
    }

    /**
     * Changes the title, position, and color of the gadget on a dashboard
     * 
     * **"Permissions" required:** None.
     * 
     * @param int $dashboardId The ID of the dashboard.
     * @param int $gadgetId The ID of the gadget.
     */
    public function updateGadget(
        Schema\DashboardGadgetUpdateRequest $request,
        int $dashboardId,
        int $gadgetId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/dashboard/{dashboardId}/gadget/{gadgetId}',
            method: 'put',
            body: $request,
            path: compact('dashboardId', 'gadgetId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Removes a dashboard gadget from a dashboard
     * 
     * When a gadget is removed from a dashboard, other gadgets in the same column are moved up to fill the emptied position
     * 
     * **"Permissions" required:** None.
     * 
     * @param int $dashboardId The ID of the dashboard.
     * @param int $gadgetId The ID of the gadget.
     */
    public function removeGadget(
        int $dashboardId,
        int $gadgetId,
    ): true {
        return $this->call(
            uri: '/rest/api/3/dashboard/{dashboardId}/gadget/{gadgetId}',
            method: 'delete',
            path: compact('dashboardId', 'gadgetId'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns the keys of all properties for a dashboard item
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** The user must be the owner of the dashboard or have the dashboard shared with them.
     * Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
     * The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira\\u2019s anonymous access is permitted.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $dashboardId The ID of the dashboard.
     * @param string $itemId The ID of the dashboard item.
     */
    public function getDashboardItemPropertyKeys(
        string $dashboardId,
        string $itemId,
    ): Schema\PropertyKeys {
        return $this->call(
            uri: '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties',
            method: 'get',
            path: compact('dashboardId', 'itemId'),
            success: 200,
            schema: Schema\PropertyKeys::class,
        );
    }

    /**
     * Returns the key and value of a dashboard item property
     * 
     * A dashboard item enables an app to add user-specific information to a user dashboard.
     * Dashboard items are exposed to users as gadgets that users can add to their dashboards.
     * For more information on how users do this, see "Adding and customizing gadgets"
     * 
     * When an app creates a dashboard item it registers a callback to receive the dashboard item ID.
     * The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item.
     * The app then uses this resource to store the item's content or configuration details.
     * For more information on working with dashboard items, see " Building a dashboard item for a JIRA Connect add-on" and the "Dashboard Item" documentation
     * 
     * There is no resource to set or get dashboard items
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** The user must be the owner of the dashboard or have the dashboard shared with them.
     * Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
     * The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira\\u2019s anonymous access is permitted.
     * 
     * @link https://confluence.atlassian.com/x/7AeiLQ
     * @link https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $dashboardId The ID of the dashboard.
     * @param string $itemId The ID of the dashboard item.
     * @param string $propertyKey The key of the dashboard item property.
     */
    public function getDashboardItemProperty(
        string $dashboardId,
        string $itemId,
        string $propertyKey,
    ): Schema\EntityProperty {
        return $this->call(
            uri: '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties/{propertyKey}',
            method: 'get',
            path: compact('dashboardId', 'itemId', 'propertyKey'),
            success: 200,
            schema: Schema\EntityProperty::class,
        );
    }

    /**
     * Sets the value of a dashboard item property.
     * Use this resource in apps to store custom data against a dashboard item
     * 
     * A dashboard item enables an app to add user-specific information to a user dashboard.
     * Dashboard items are exposed to users as gadgets that users can add to their dashboards.
     * For more information on how users do this, see "Adding and customizing gadgets"
     * 
     * When an app creates a dashboard item it registers a callback to receive the dashboard item ID.
     * The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item.
     * The app then uses this resource to store the item's content or configuration details.
     * For more information on working with dashboard items, see " Building a dashboard item for a JIRA Connect add-on" and the "Dashboard Item" documentation
     * 
     * There is no resource to set or get dashboard items
     * 
     * The value of the request body must be a "valid", non-empty JSON blob.
     * The maximum length is 32768 characters
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** The user must be the owner of the dashboard.
     * Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
     * 
     * @link https://confluence.atlassian.com/x/7AeiLQ
     * @link https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/
     * @link https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/
     * @link http://tools.ietf.org/html/rfc4627
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $dashboardId The ID of the dashboard.
     * @param string $itemId The ID of the dashboard item.
     * @param string $propertyKey The key of the dashboard item property.
     *                            The maximum length is 255 characters.
     *                            For dashboard items with a spec URI and no complete module key, if the provided propertyKey is equal to "config", the request body's JSON must be an object with all keys and values as strings.
     */
    public function setDashboardItemProperty(
        string $dashboardId,
        string $itemId,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties/{propertyKey}',
            method: 'put',
            path: compact('dashboardId', 'itemId', 'propertyKey'),
            success: 200,
            schema: true,
        );
    }

    /**
     * Deletes a dashboard item property
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** The user must be the owner of the dashboard.
     * Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $dashboardId The ID of the dashboard.
     * @param string $itemId The ID of the dashboard item.
     * @param string $propertyKey The key of the dashboard item property.
     */
    public function deleteDashboardItemProperty(
        string $dashboardId,
        string $itemId,
        string $propertyKey,
    ): true {
        return $this->call(
            uri: '/rest/api/3/dashboard/{dashboardId}/items/{itemId}/properties/{propertyKey}',
            method: 'delete',
            path: compact('dashboardId', 'itemId', 'propertyKey'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Returns a dashboard
     * 
     * This operation can be accessed anonymously
     * 
     * **"Permissions" required:** None
     * 
     * However, to get a dashboard, the dashboard must be shared with the user or the user must own it.
     * Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
     * The System dashboard is considered to be shared with all other users.
     * 
     * @link https://confluence.atlassian.com/x/x4dKLg
     * 
     * @param string $id The ID of the dashboard.
     */
    public function getDashboard(
        string $id,
    ): Schema\Dashboard {
        return $this->call(
            uri: '/rest/api/3/dashboard/{id}',
            method: 'get',
            path: compact('id'),
            success: 200,
            schema: Schema\Dashboard::class,
        );
    }

    /**
     * Updates a dashboard, replacing all the dashboard details with those provided
     * 
     * **"Permissions" required:** None
     * 
     * The dashboard to be updated must be owned by the user.
     * 
     * @param string $id The ID of the dashboard to update.
     * @param bool $extendAdminPermissions Whether admin level permissions are used.
     *                                     It should only be true if the user has *Administer Jira* "global permission"
     *                                     @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function updateDashboard(
        Schema\DashboardDetails $request,
        string $id,
        ?bool $extendAdminPermissions = false,
    ): Schema\Dashboard {
        return $this->call(
            uri: '/rest/api/3/dashboard/{id}',
            method: 'put',
            body: $request,
            query: compact('extendAdminPermissions'),
            path: compact('id'),
            success: 200,
            schema: Schema\Dashboard::class,
        );
    }

    /**
     * Deletes a dashboard
     * 
     * **"Permissions" required:** None
     * 
     * The dashboard to be deleted must be owned by the user.
     * 
     * @param string $id The ID of the dashboard.
     */
    public function deleteDashboard(
        string $id,
    ): true {
        return $this->call(
            uri: '/rest/api/3/dashboard/{id}',
            method: 'delete',
            path: compact('id'),
            success: 204,
            schema: true,
        );
    }

    /**
     * Copies a dashboard.
     * Any values provided in the `dashboard` parameter replace those in the copied dashboard
     * 
     * **"Permissions" required:** None
     * 
     * The dashboard to be copied must be owned by or shared with the user.
     * 
     * @param string $id 
     * @param bool $extendAdminPermissions Whether admin level permissions are used.
     *                                     It should only be true if the user has *Administer Jira* "global permission"
     *                                     @link https://confluence.atlassian.com/x/x4dKLg
     */
    public function copyDashboard(
        Schema\DashboardDetails $request,
        string $id,
        ?bool $extendAdminPermissions = false,
    ): Schema\Dashboard {
        return $this->call(
            uri: '/rest/api/3/dashboard/{id}/copy',
            method: 'post',
            body: $request,
            query: compact('extendAdminPermissions'),
            path: compact('id'),
            success: 200,
            schema: Schema\Dashboard::class,
        );
    }
}
