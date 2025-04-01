# Filters

Source: [`Jira\Client\Operations\Filters`](/src/Operations/Filters.php)

## Operations

- [Create Filter](#createFilter)
- [Get Favorite Filters](#getFavouriteFilters)
- [Get My Filters](#getMyFilters)
- [Search For Filters](#getFiltersPaginated)
- [Get Filter](#getFilter)
- [Update Filter](#updateFilter)
- [Delete Filter](#deleteFilter)
- [Get Columns](#getColumns)
- [Set Columns](#setColumns)
- [Reset Columns](#resetColumns)
- [Add Filter As Favorite](#setFavouriteForFilter)
- [Remove Filter As Favorite](#deleteFavouriteForFilter)
- [Change Filter Owner](#changeFilterOwner)

## Create Filter
<a name="createFilter"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-post

Creates a filter.
The filter is shared according to the "default share scope".
The filter is not selected as a favorite

**"Permissions" required:** Permission to access Jira.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Filter $response */
$response = $client->createFilter(
    request: new Schema\Filter(
        description: 'Lists all open bugs',
        jql: 'type = Bug and resolution is empty',
        name: 'All Open Bugs',
    )
    expand: null,
    overrideSharePermissions: false,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Filter`](/docs/schema/filter.md)

Details about a filter.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the filter. Must be unique. |
| `approximateLastUsed` | `string` | \[Experimental\] Approximate last used time. Returns the date and time when the filter was last used. Returns `null` if the filter hasn't been used after tracking was enabled. For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate. |
| `description` | `string` | A description of the filter. |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that can edit the filter. |
| `favourite` | `bool` | Whether the filter is selected as a favorite. |
| `favouritedCount` | `int` | The count of how many users have selected this filter as a favorite, including the filter owner. |
| `id` | `string` | The unique identifier for the filter. |
| `jql` | `string` | The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*. |
| `owner` | [`User`](/docs/schema/user.md) | The user who owns the filter. This is defaulted to the creator of the filter, however Jira administrators can change the owner of a shared filter in the admin settings. |
| `searchUrl` | `string` | A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*. |
| `self` | `string` | The URL of the filter. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that the filter is shared with. |
| `sharedUsers` | [`UserList`](/docs/schema/user-list.md) | A paginated list of the users that the filter is shared with. This includes users that are members of the groups or can browse the projects that the filter is shared with. |
| `subscriptions` | [`FilterSubscriptionsList`](/docs/schema/filter-subscriptions-list.md) | A paginated list of the users that are subscribed to the filter. |
| `viewUrl` | `string` | A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.<br/> *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`. |
| `overrideSharePermissions` | `?bool` | EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be created. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |

#### Response

Source: [`Jira\Client\Schema\Filter`](/docs/schema/filter.md)

Details about a filter.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the filter. Must be unique. |
| `approximateLastUsed` | `string` | \[Experimental\] Approximate last used time. Returns the date and time when the filter was last used. Returns `null` if the filter hasn't been used after tracking was enabled. For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate. |
| `description` | `string` | A description of the filter. |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that can edit the filter. |
| `favourite` | `bool` | Whether the filter is selected as a favorite. |
| `favouritedCount` | `int` | The count of how many users have selected this filter as a favorite, including the filter owner. |
| `id` | `string` | The unique identifier for the filter. |
| `jql` | `string` | The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*. |
| `owner` | [`User`](/docs/schema/user.md) | The user who owns the filter. This is defaulted to the creator of the filter, however Jira administrators can change the owner of a shared filter in the admin settings. |
| `searchUrl` | `string` | A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*. |
| `self` | `string` | The URL of the filter. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that the filter is shared with. |
| `sharedUsers` | [`UserList`](/docs/schema/user-list.md) | A paginated list of the users that the filter is shared with. This includes users that are members of the groups or can browse the projects that the filter is shared with. |
| `subscriptions` | [`FilterSubscriptionsList`](/docs/schema/filter-subscriptions-list.md) | A paginated list of the users that are subscribed to the filter. |
| `viewUrl` | `string` | A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*. |


## Get Favorite Filters
<a name="getFavouriteFilters"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-favourite-get

Returns the visible favorite filters of the user

This operation can be accessed anonymously

**"Permissions" required:** A favorite filter is only visible to the user where the filter is:

 - owned by the user
 - shared with a group that the user is a member of
 - shared with a private project that the user has *Browse projects* "project permission" for
 - shared with a public project
 - shared with the public

For example, if the user favorites a public filter that is subsequently made private that filter is not returned by this operation.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getFavouriteFilters(
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.<br/> *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`. |

#### Response


## Get My Filters
<a name="getMyFilters"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-my-get

Returns the filters owned by the user.
If `includeFavourites` is `true`, the user's visible favorite filters are also returned

**"Permissions" required:** Permission to access Jira, however, a favorite filters is only visible to the user where the filter is:

 - owned by the user
 - shared with a group that the user is a member of
 - shared with a private project that the user has *Browse projects* "project permission" for
 - shared with a public project
 - shared with the public

For example, if the user favorites a public filter that is subsequently made private that filter is not returned by this operation.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getMyFilters(
    expand: null,
    includeFavourites: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.<br/> *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`. |
| `includeFavourites` | `?bool` | Include the user's favorite filters in the response. |

#### Response


## Search For Filters
<a name="getFiltersPaginated"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-search-get

Returns a "paginated" list of filters.
Use this operation to get:

 - specific filters, by defining `id` only
 - filters that match all of the specified attributes.
For example, all filters for a user with a particular word in their name.
When multiple attributes are specified only filters matching all attributes are returned

This operation can be accessed anonymously

**"Permissions" required:** None, however, only the following filters that match the query parameters are returned:

 - filters owned by the user
 - filters shared with a group that the user is a member of
 - filters shared with a private project that the user has *Browse projects* "project permission" for
 - filters shared with a public project
 - filters shared with the public.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PageBeanFilterDetails $response */
$response = $client->getFiltersPaginated(
    filterName: null,
    accountId: null,
    owner: null,
    groupname: null,
    groupId: null,
    projectId: null,
    id: null,
    orderBy: 'name',
    startAt: 0,
    maxResults: 50,
    expand: null,
    overrideSharePermissions: false,
    isSubstringMatch: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `filterName` | `?string` | String used to perform a case-insensitive partial match with `name`. |
| `accountId` | `?string` | User account ID used to return filters with the matching `owner.accountId`. This parameter cannot be used with `owner`. |
| `owner` | `?string` | This parameter is deprecated because of privacy changes. Use `accountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. User name used to return filters with the matching `owner.name`. This parameter cannot be used with `accountId`. |
| `groupname` | `?string` | As a group's name can change, use of `groupId` is recommended to identify a group. Group name used to returns filters that are shared with a group that matches `sharePermissions.group.groupname`. This parameter cannot be used with the `groupId` parameter. |
| `groupId` | `?string` | Group ID used to returns filters that are shared with a group that matches `sharePermissions.group.groupId`. This parameter cannot be used with the `groupname` parameter. |
| `projectId` | `?int` | Project ID used to returns filters that are shared with a project that matches `sharePermissions.project.id`. |
| `id` | `?list<int>` | The list of filter IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. Do not exceed 200 filter IDs. |
| `orderBy` | `'description'\|`<br/>`'-description'\|`<br/>`'+description'\|`<br/>`'favourite_count'\|`<br/>`'-favourite_count'\|`<br/>`'+favourite_count'\|`<br/>`'id'\|`<br/>`'-id'\|`<br/>`'+id'\|`<br/>`'is_favourite'\|`<br/>`'-is_favourite'\|`<br/>`'+is_favourite'\|`<br/>`'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'owner'\|`<br/>`'-owner'\|`<br/>`'+owner'\|`<br/>`'is_shared'\|`<br/>`'-is_shared'\|`<br/>`'+is_shared'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `description` Sorts by filter description. Note that this sorting works independently of whether the expand to display the description field is in use.<br/> *  `favourite_count` Sorts by the count of how many users have this filter as a favorite.<br/> *  `is_favourite` Sorts by whether the filter is marked as a favorite.<br/> *  `id` Sorts by filter ID.<br/> *  `name` Sorts by filter name.<br/> *  `owner` Sorts by the ID of the filter owner.<br/> *  `is_shared` Sorts by whether the filter is shared. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `description` Returns the description of the filter.<br/> *  `favourite` Returns an indicator of whether the user has set the filter as a favorite.<br/> *  `favouritedCount` Returns a count of how many users have set this filter as a favorite.<br/> *  `jql` Returns the JQL query that the filter uses.<br/> *  `owner` Returns the owner of the filter.<br/> *  `searchUrl` Returns a URL to perform the filter's JQL query.<br/> *  `sharePermissions` Returns the share permissions defined for the filter.<br/> *  `editPermissions` Returns the edit permissions defined for the filter.<br/> *  `isWritable` Returns whether the current user has permission to edit the filter.<br/> *  `approximateLastUsed` \[Experimental\] Returns the approximate date and time when the filter was last evaluated.<br/> *  `subscriptions` Returns the users that are subscribed to the filter.<br/> *  `viewUrl` Returns a URL to view the filter. |
| `overrideSharePermissions` | `?bool` | EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be returned. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |
| `isSubstringMatch` | `?bool` | When `true` this will perform a case-insensitive substring match for the provided `filterName`. When `false` the filter name will be searched using [full text search syntax](https://support.atlassian.com/jira-software-cloud/docs/search-for-issues-using-the-text-field/). |

#### Response

Source: [`Jira\Client\Schema\PageBeanFilterDetails`](/docs/schema/page-bean-filter-details.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<FilterDetails>`](/docs/schema/filter-details.md) | The list of items. |


## Get Filter
<a name="getFilter"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-id-get

Returns a filter

This operation can be accessed anonymously

**"Permissions" required:** None, however, the filter is only returned where it is:

 - owned by the user
 - shared with a group that the user is a member of
 - shared with a private project that the user has *Browse projects* "project permission" for
 - shared with a public project
 - shared with the public.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\Filter $response */
$response = $client->getFilter(
    id: 1234,
    expand: null,
    overrideSharePermissions: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter to return. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.<br/> *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`. |
| `overrideSharePermissions` | `?bool` | EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be returned. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |

#### Response

Source: [`Jira\Client\Schema\Filter`](/docs/schema/filter.md)

Details about a filter.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the filter. Must be unique. |
| `approximateLastUsed` | `string` | \[Experimental\] Approximate last used time. Returns the date and time when the filter was last used. Returns `null` if the filter hasn't been used after tracking was enabled. For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate. |
| `description` | `string` | A description of the filter. |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that can edit the filter. |
| `favourite` | `bool` | Whether the filter is selected as a favorite. |
| `favouritedCount` | `int` | The count of how many users have selected this filter as a favorite, including the filter owner. |
| `id` | `string` | The unique identifier for the filter. |
| `jql` | `string` | The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*. |
| `owner` | [`User`](/docs/schema/user.md) | The user who owns the filter. This is defaulted to the creator of the filter, however Jira administrators can change the owner of a shared filter in the admin settings. |
| `searchUrl` | `string` | A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*. |
| `self` | `string` | The URL of the filter. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that the filter is shared with. |
| `sharedUsers` | [`UserList`](/docs/schema/user-list.md) | A paginated list of the users that the filter is shared with. This includes users that are members of the groups or can browse the projects that the filter is shared with. |
| `subscriptions` | [`FilterSubscriptionsList`](/docs/schema/filter-subscriptions-list.md) | A paginated list of the users that are subscribed to the filter. |
| `viewUrl` | `string` | A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*. |


## Update Filter
<a name="updateFilter"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-id-put

Updates a filter.
Use this operation to update a filter's name, description, JQL, or sharing

**"Permissions" required:** Permission to access Jira, however the user must own the filter.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Filter $response */
$response = $client->updateFilter(
    request: new Schema\Filter(
        description: 'Lists all open bugs',
        jql: 'type = Bug and resolution is empty',
        name: 'All Open Bugs',
    )
    id: 1234,
    expand: null,
    overrideSharePermissions: false,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Filter`](/docs/schema/filter.md)

Details about a filter.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the filter. Must be unique. |
| `approximateLastUsed` | `string` | \[Experimental\] Approximate last used time. Returns the date and time when the filter was last used. Returns `null` if the filter hasn't been used after tracking was enabled. For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate. |
| `description` | `string` | A description of the filter. |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that can edit the filter. |
| `favourite` | `bool` | Whether the filter is selected as a favorite. |
| `favouritedCount` | `int` | The count of how many users have selected this filter as a favorite, including the filter owner. |
| `id` | `string` | The unique identifier for the filter. |
| `jql` | `string` | The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*. |
| `owner` | [`User`](/docs/schema/user.md) | The user who owns the filter. This is defaulted to the creator of the filter, however Jira administrators can change the owner of a shared filter in the admin settings. |
| `searchUrl` | `string` | A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*. |
| `self` | `string` | The URL of the filter. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that the filter is shared with. |
| `sharedUsers` | [`UserList`](/docs/schema/user-list.md) | A paginated list of the users that the filter is shared with. This includes users that are members of the groups or can browse the projects that the filter is shared with. |
| `subscriptions` | [`FilterSubscriptionsList`](/docs/schema/filter-subscriptions-list.md) | A paginated list of the users that are subscribed to the filter. |
| `viewUrl` | `string` | A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter to update. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.<br/> *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`. |
| `overrideSharePermissions` | `?bool` | EXPERIMENTAL: Whether share permissions are overridden to enable the addition of any share permissions to filters. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |

#### Response

Source: [`Jira\Client\Schema\Filter`](/docs/schema/filter.md)

Details about a filter.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the filter. Must be unique. |
| `approximateLastUsed` | `string` | \[Experimental\] Approximate last used time. Returns the date and time when the filter was last used. Returns `null` if the filter hasn't been used after tracking was enabled. For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate. |
| `description` | `string` | A description of the filter. |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that can edit the filter. |
| `favourite` | `bool` | Whether the filter is selected as a favorite. |
| `favouritedCount` | `int` | The count of how many users have selected this filter as a favorite, including the filter owner. |
| `id` | `string` | The unique identifier for the filter. |
| `jql` | `string` | The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*. |
| `owner` | [`User`](/docs/schema/user.md) | The user who owns the filter. This is defaulted to the creator of the filter, however Jira administrators can change the owner of a shared filter in the admin settings. |
| `searchUrl` | `string` | A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*. |
| `self` | `string` | The URL of the filter. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that the filter is shared with. |
| `sharedUsers` | [`UserList`](/docs/schema/user-list.md) | A paginated list of the users that the filter is shared with. This includes users that are members of the groups or can browse the projects that the filter is shared with. |
| `subscriptions` | [`FilterSubscriptionsList`](/docs/schema/filter-subscriptions-list.md) | A paginated list of the users that are subscribed to the filter. |
| `viewUrl` | `string` | A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*. |


## Delete Filter
<a name="deleteFilter"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-id-delete

Delete a filter

**"Permissions" required:** Permission to access Jira, however filters can only be deleted by the creator of the filter or a user with *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteFilter(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter to delete. |

#### Response

`true`
## Get Columns
<a name="getColumns"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-id-columns-get

Returns the columns configured for a filter.
The column configuration is used when the filter's results are viewed in *List View* with the *Columns* set to *Filter*

This operation can be accessed anonymously

**"Permissions" required:** None, however, column details are only returned for:

 - filters owned by the user
 - filters shared with a group that the user is a member of
 - filters shared with a private project that the user has *Browse projects* "project permission" for
 - filters shared with a public project
 - filters shared with the public.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getColumns(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter. |

#### Response


## Set Columns
<a name="setColumns"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-id-columns-put

Sets the columns for a filter.
Only navigable fields can be set as columns.
Use "Get fields" to get the list fields in Jira.
A navigable field has `navigable` set to `true`

The parameters for this resource are expressed as HTML form data.
For example, in curl:

`curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/filter/10000/columns`

**"Permissions" required:** Permission to access Jira, however, columns are only set for:

 - filters owned by the user
 - filters shared with a group that the user is a member of
 - filters shared with a private project that the user has *Browse projects* "project permission" for
 - filters shared with a public project
 - filters shared with the public.
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\ColumnRequestBody`](/docs/schema/column-request-body.md)

| Property | Type | Description |
| --- | --- | --- |
| `columns` | `?list<string>` |  |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter. |

#### Response

`true`
## Reset Columns
<a name="resetColumns"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-id-columns-delete

Reset the user's column configuration for the filter to the default

**"Permissions" required:** Permission to access Jira, however, columns are only reset for:

 - filters owned by the user
 - filters shared with a group that the user is a member of
 - filters shared with a private project that the user has *Browse projects* "project permission" for
 - filters shared with a public project
 - filters shared with the public.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var true $response */
$response = $client->resetColumns(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter. |

#### Response

`true`
## Add Filter As Favorite
<a name="setFavouriteForFilter"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-id-favourite-put

Add a filter as a favorite for the user

**"Permissions" required:** Permission to access Jira, however, the user can only favorite:

 - filters owned by the user
 - filters shared with a group that the user is a member of
 - filters shared with a private project that the user has *Browse projects* "project permission" for
 - filters shared with a public project
 - filters shared with the public.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\Filter $response */
$response = $client->setFavouriteForFilter(
    id: 1234,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.<br/> *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`. |

#### Response

Source: [`Jira\Client\Schema\Filter`](/docs/schema/filter.md)

Details about a filter.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the filter. Must be unique. |
| `approximateLastUsed` | `string` | \[Experimental\] Approximate last used time. Returns the date and time when the filter was last used. Returns `null` if the filter hasn't been used after tracking was enabled. For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate. |
| `description` | `string` | A description of the filter. |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that can edit the filter. |
| `favourite` | `bool` | Whether the filter is selected as a favorite. |
| `favouritedCount` | `int` | The count of how many users have selected this filter as a favorite, including the filter owner. |
| `id` | `string` | The unique identifier for the filter. |
| `jql` | `string` | The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*. |
| `owner` | [`User`](/docs/schema/user.md) | The user who owns the filter. This is defaulted to the creator of the filter, however Jira administrators can change the owner of a shared filter in the admin settings. |
| `searchUrl` | `string` | A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*. |
| `self` | `string` | The URL of the filter. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that the filter is shared with. |
| `sharedUsers` | [`UserList`](/docs/schema/user-list.md) | A paginated list of the users that the filter is shared with. This includes users that are members of the groups or can browse the projects that the filter is shared with. |
| `subscriptions` | [`FilterSubscriptionsList`](/docs/schema/filter-subscriptions-list.md) | A paginated list of the users that are subscribed to the filter. |
| `viewUrl` | `string` | A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*. |


## Remove Filter As Favorite
<a name="deleteFavouriteForFilter"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-id-favourite-delete

Removes a filter as a favorite for the user.
Note that this operation only removes filters visible to the user from the user's favorites list.
For example, if the user favorites a public filter that is subsequently made private (and is therefore no longer visible on their favorites list) they cannot remove it from their favorites list

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\Filter $response */
$response = $client->deleteFavouriteForFilter(
    id: 1234,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.<br/> *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`. |

#### Response

Source: [`Jira\Client\Schema\Filter`](/docs/schema/filter.md)

Details about a filter.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the filter. Must be unique. |
| `approximateLastUsed` | `string` | \[Experimental\] Approximate last used time. Returns the date and time when the filter was last used. Returns `null` if the filter hasn't been used after tracking was enabled. For performance reasons, timestamps aren't updated in real time and therefore may not be exactly accurate. |
| `description` | `string` | A description of the filter. |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that can edit the filter. |
| `favourite` | `bool` | Whether the filter is selected as a favorite. |
| `favouritedCount` | `int` | The count of how many users have selected this filter as a favorite, including the filter owner. |
| `id` | `string` | The unique identifier for the filter. |
| `jql` | `string` | The JQL query for the filter. For example, *project = SSP AND issuetype = Bug*. |
| `owner` | [`User`](/docs/schema/user.md) | The user who owns the filter. This is defaulted to the creator of the filter, however Jira administrators can change the owner of a shared filter in the admin settings. |
| `searchUrl` | `string` | A URL to view the filter results in Jira, using the [Search for issues using JQL](#api-rest-api-3-filter-search-get) operation with the filter's JQL string to return the filter results. For example, *https://your-domain.atlassian.net/rest/api/3/search?jql=project+%3D+SSP+AND+issuetype+%3D+Bug*. |
| `self` | `string` | The URL of the filter. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The groups and projects that the filter is shared with. |
| `sharedUsers` | [`UserList`](/docs/schema/user-list.md) | A paginated list of the users that the filter is shared with. This includes users that are members of the groups or can browse the projects that the filter is shared with. |
| `subscriptions` | [`FilterSubscriptionsList`](/docs/schema/filter-subscriptions-list.md) | A paginated list of the users that are subscribed to the filter. |
| `viewUrl` | `string` | A URL to view the filter results in Jira, using the ID of the filter. For example, *https://your-domain.atlassian.net/issues/?filter=10100*. |


## Change Filter Owner
<a name="changeFilterOwner"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-filters/#api-rest-api-3-filter-id-owner-put

Changes the owner of the filter

**"Permissions" required:** Permission to access Jira.
However, the user must own the filter or have the *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->changeFilterOwner(
    request: new Schema\ChangeFilterOwner(
        accountId: '0000-0000-0000-0000',
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ChangeFilterOwner`](/docs/schema/change-filter-owner.md)

The account ID of the new owner.

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the new owner. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the filter to update. |

#### Response

`true`
