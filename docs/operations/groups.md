# Groups

Source: [`Jira\Client\Operations\Groups`](/src/Operations/Groups.php)

## Operations

- [Get Group](#getGroup)
- [Create Group](#createGroup)
- [Remove Group](#removeGroup)
- [Bulk Get Groups](#bulkGetGroups)
- [Get Users From Group](#getUsersFromGroup)
- [Add User To Group](#addUserToGroup)
- [Remove User From Group](#removeUserFromGroup)
- [Find Groups](#findGroups)

## Get Group
<a name="getGroup"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-groups/#api-rest-api-3-group-get

This operation is deprecated, use "`group/member`"

Returns all users in a group

**"Permissions" required:** either of:

 - *Browse users and groups* "global permission"
 - *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `groupname` | `?string` | As a group's name can change, use of `groupId` is recommended to identify a group.  <br/>The name of the group. This parameter cannot be used with the `groupId` parameter. |
| `groupId` | `?string` | The ID of the group. This parameter cannot be used with the `groupName` parameter. |
| `expand` | `?string` | List of fields to expand. |

#### Response

Source: [`Jira\Client\Schema\Group`](/docs/schema/group.md)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional group details in the response. |
| `groupId` | `string` | The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. |
| `name` | `string` | The name of group. |
| `self` | `string` | The URL for these group details. |
| `users` | [`PagedListUserDetailsApplicationUser`](/docs/schema/paged-list-user-details-application-user.md) | A paginated list of the users that are members of the group. A maximum of 50 users is returned in the list, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 50 users, use`?expand=users[51:100]`. |


## Create Group
<a name="createGroup"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-groups/#api-rest-api-3-group-post

Creates a group

**"Permissions" required:** Site administration (that is, member of the *site-admin* "group").
See: https://confluence.atlassian.com/x/24xjL

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Group $response */
$response = $client->createGroup(new Schema\AddGroupBean(
    name: 'power-users',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\AddGroupBean`](/docs/schema/add-group-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the group. |

#### Response

Source: [`Jira\Client\Schema\Group`](/docs/schema/group.md)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional group details in the response. |
| `groupId` | `string` | The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. |
| `name` | `string` | The name of group. |
| `self` | `string` | The URL for these group details. |
| `users` | [`PagedListUserDetailsApplicationUser`](/docs/schema/paged-list-user-details-application-user.md) | A paginated list of the users that are members of the group. A maximum of 50 users is returned in the list, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 50 users, use`?expand=users[51:100]`. |


## Remove Group
<a name="removeGroup"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-groups/#api-rest-api-3-group-delete

Deletes a group

**"Permissions" required:** Site administration (that is, member of the *site-admin* strategic "group").
See: https://confluence.atlassian.com/x/24xjL


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `groupname` | `?string` |  |
| `groupId` | `?string` | The ID of the group. This parameter cannot be used with the `groupname` parameter. |
| `swapGroup` | `?string` | As a group's name can change, use of `swapGroupId` is recommended to identify a group.  <br/>The group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroupId` parameter. |
| `swapGroupId` | `?string` | The ID of the group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroup` parameter. |

#### Response

`true`
## Bulk Get Groups
<a name="bulkGetGroups"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-groups/#api-rest-api-3-group-bulk-get

Returns a "paginated" list of groups

**"Permissions" required:** *Browse users and groups* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanGroupDetails $response */
$response = $client->bulkGetGroups(
    startAt: 0,
    maxResults: 50,
    groupId: json_decode('["3571b9a7-348f-414a-9087-8e1ea03a7df8"]', true),
    groupName: null,
    accessType: null,
    applicationKey: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `groupId` | `?list<string>` | The ID of a group. To specify multiple IDs, pass multiple `groupId` parameters. For example, `groupId=5b10a2844c20165700ede21g&groupId=5b10ac8d82e05b22cc7d4ef5`. |
| `groupName` | `?list<string>` | The name of a group. To specify multiple names, pass multiple `groupName` parameters. For example, `groupName=administrators&groupName=jira-software-users`. |
| `accessType` | `?string` | The access level of a group. Valid values: 'site-admin', 'admin', 'user'. |
| `applicationKey` | `?string` | The application key of the product user groups to search for. Valid values: 'jira-servicedesk', 'jira-software', 'jira-product-discovery', 'jira-core'. |

#### Response

Source: [`Jira\Client\Schema\PageBeanGroupDetails`](/docs/schema/page-bean-group-details.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<GroupDetails>`](/docs/schema/group-details.md) | The list of items. |


## Get Users From Group
<a name="getUsersFromGroup"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-groups/#api-rest-api-3-group-member-get

Returns a "paginated" list of all users in a group

Note that users are ordered by username, however the username is not returned in the results due to privacy reasons

**"Permissions" required:** either of:

 - *Browse users and groups* "global permission"
 - *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanUserDetails $response */
$response = $client->getUsersFromGroup(
    groupname: null,
    groupId: null,
    includeInactiveUsers: false,
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `groupname` | `?string` | As a group's name can change, use of `groupId` is recommended to identify a group.  <br/>The name of the group. This parameter cannot be used with the `groupId` parameter. |
| `groupId` | `?string` | The ID of the group. This parameter cannot be used with the `groupName` parameter. |
| `includeInactiveUsers` | `?bool` | Include inactive users. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page (number should be between 1 and 50). |

#### Response

Source: [`Jira\Client\Schema\PageBeanUserDetails`](/docs/schema/page-bean-user-details.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<UserDetails>`](/docs/schema/user-details.md) | The list of items. |


## Add User To Group
<a name="addUserToGroup"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-groups/#api-rest-api-3-group-user-post

Adds a user to a group

**"Permissions" required:** Site administration (that is, member of the *site-admin* "group").
See: https://confluence.atlassian.com/x/24xjL


### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateUserToGroupBean`](/docs/schema/update-user-to-group-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `name` | `string` | This property is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `groupname` | `?string` | As a group's name can change, use of `groupId` is recommended to identify a group.  <br/>The name of the group. This parameter cannot be used with the `groupId` parameter. |
| `groupId` | `?string` | The ID of the group. This parameter cannot be used with the `groupName` parameter. |

#### Response

Source: [`Jira\Client\Schema\Group`](/docs/schema/group.md)

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `string` | Expand options that include additional group details in the response. |
| `groupId` | `string` | The ID of the group, which uniquely identifies the group across all Atlassian products. For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. |
| `name` | `string` | The name of group. |
| `self` | `string` | The URL for these group details. |
| `users` | [`PagedListUserDetailsApplicationUser`](/docs/schema/paged-list-user-details-application-user.md) | A paginated list of the users that are members of the group. A maximum of 50 users is returned in the list, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 50 users, use`?expand=users[51:100]`. |


## Remove User From Group
<a name="removeUserFromGroup"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-groups/#api-rest-api-3-group-user-delete

Removes a user from a group

**"Permissions" required:** Site administration (that is, member of the *site-admin* "group").
See: https://confluence.atlassian.com/x/24xjL


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `groupname` | `?string` | As a group's name can change, use of `groupId` is recommended to identify a group.  <br/>The name of the group. This parameter cannot be used with the `groupId` parameter. |
| `groupId` | `?string` | The ID of the group. This parameter cannot be used with the `groupName` parameter. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response

`true`
## Find Groups
<a name="findGroups"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-groups/#api-rest-api-3-groups-picker-get

Returns a list of groups whose names contain a query string.
A list of group names can be provided to exclude groups from the results

The primary use case for this resource is to populate a group picker suggestions list.
To this end, the returned object includes the `html` field where the matched query term is highlighted in the group name with the HTML strong tag.
Also, the groups list is wrapped in a response object that contains a header for use in the picker, specifically *Showing X of Y matching groups*

The list returns with the groups sorted.
If no groups match the list criteria, an empty list is returned

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission".
Anonymous calls and calls by users without the required permission return an empty list

*Browse users and groups* "global permission".
Without this permission, calls where query is not an exact match to an existing group will return an empty list.
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\FoundGroups $response */
$response = $client->findGroups(
    accountId: null,
    query: 'query',
    exclude: null,
    excludeId: null,
    maxResults: null,
    caseInsensitive: false,
    userName: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `?string` | This parameter is deprecated, setting it does not affect the results. To find groups containing a particular user, use [Get user groups](#api-rest-api-3-user-groups-get). |
| `query` | `?string` | The string to find in group names. |
| `exclude` | `?list<string>` | As a group's name can change, use of `excludeGroupIds` is recommended to identify a group.  <br/>A group to exclude from the result. To exclude multiple groups, provide an ampersand-separated list. For example, `exclude=group1&exclude=group2`. This parameter cannot be used with the `excludeGroupIds` parameter. |
| `excludeId` | `?list<string>` | A group ID to exclude from the result. To exclude multiple groups, provide an ampersand-separated list. For example, `excludeId=group1-id&excludeId=group2-id`. This parameter cannot be used with the `excludeGroups` parameter. |
| `maxResults` | `?int` | The maximum number of groups to return. The maximum number of groups that can be returned is limited by the system property `jira.ajax.autocomplete.limit`. |
| `caseInsensitive` | `?bool` | Whether the search for groups should be case insensitive. |
| `userName` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response

Source: [`Jira\Client\Schema\FoundGroups`](/docs/schema/found-groups.md)

The list of groups found in a search, including header text (Showing X of Y matching groups) and total of matched groups.

| Property | Type | Description |
| --- | --- | --- |
| `groups` | [`?list<FoundGroup>`](/docs/schema/found-group.md) |  |
| `header` | `string` | Header text indicating the number of groups in the response and the total number of groups found in the search. |
| `total` | `int` | The total number of groups found in the search. |
