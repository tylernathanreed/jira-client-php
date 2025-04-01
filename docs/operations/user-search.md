# User Search

DummyDescription

Source: [`Jira\Client\Operations\UserSearch`](/src/Operations/UserSearch.php)

## Operations

- [Find Users Assignable To Projects](#findBulkAssignableUsers)
- [Find Users Assignable To Issues](#findAssignableUsers)
- [Find Users With Permissions](#findUsersWithAllPermissions)
- [Find Users For Picker](#findUsersForPicker)
- [Find Users](#findUsers)
- [Find Users By Query](#findUsersByQuery)
- [Find User Keys By Query](#findUserKeysByQuery)
- [Find Users With Browse Permission](#findUsersWithBrowsePermission)

## Find Users Assignable To Projects
<a name="findBulkAssignableUsers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-search/#api-rest-api-3-user-assignable-multi-project-search-get

Returns a list of users who can be assigned issues in one or more projects.
The list may be restricted to users whose attributes match a string

This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that can be assigned issues in the projects.
This means the operation usually returns fewer users than specified in `maxResults`.
To get all the users who can be assigned issues in the projects, use "Get all users" and filter the records in your code

Privacy controls are applied to the response based on the users' preferences.
This could mean, for example, that the user's email address is hidden.
See the "Profile visibility overview" for more details

This operation can be accessed anonymously

**"Permissions" required:** None.
See: https://developer.atlassian.com/cloud/jira/platform/profile-visibility/

### Example

```php
/** @var array $response */
$response = $client->findBulkAssignableUsers(
    projectKeys: 'foo',
    query: 'query',
    username: null,
    accountId: null,
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectKeys` | `string` | A list of project keys (case sensitive). This parameter accepts a comma-separated list. |
| `query` | `?string` | A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` is specified. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `accountId` | `?string` | A query string that is matched exactly against user `accountId`. Required, unless `query` is specified. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response


## Find Users Assignable To Issues
<a name="findAssignableUsers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-search/#api-rest-api-3-user-assignable-search-get

Returns a list of users that can be assigned to an issue.
Use this operation to find the list of users who can be assigned to:

 - a new issue, by providing the `projectKeyOrId`
 - an updated issue, by providing the `issueKey` or `issueId`
 - to an issue during a transition (workflow action), by providing the `issueKey` or `issueId` and the transition id in `actionDescriptorId`.
You can obtain the IDs of an issue's valid transitions using the `transitions` option in the `expand` parameter of " Get issue"

In all these cases, you can pass an account ID to determine if a user can be assigned to an issue.
The user is returned in the response if they can be assigned to the issue or issue transition

This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that can be assigned the issue.
This means the operation usually returns fewer users than specified in `maxResults`.
To get all the users who can be assigned the issue, use "Get all users" and filter the records in your code

Privacy controls are applied to the response based on the users' preferences.
This could mean, for example, that the user's email address is hidden.
See the "Profile visibility overview" for more details

**"Permissions" required:** *Browse users and groups* "global permission" or *Assign issues* "project permission"
See: https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->findAssignableUsers(
    query: 'query',
    sessionId: null,
    username: null,
    accountId: null,
    project: null,
    issueKey: null,
    issueId: null,
    startAt: 0,
    maxResults: 50,
    actionDescriptorId: null,
    recommend: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `query` | `?string` | A query string that is matched against user attributes, such as `displayName`, and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `username` or `accountId` is specified. |
| `sessionId` | `?string` | The sessionId of this request. SessionId is the same until the assignee is set. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `accountId` | `?string` | A query string that is matched exactly against user `accountId`. Required, unless `query` is specified. |
| `project` | `?string` | The project ID or project key (case sensitive). Required, unless `issueKey` or `issueId` is specified. |
| `issueKey` | `?string` | The key of the issue. Required, unless `issueId` or `project` is specified. |
| `issueId` | `?string` | The ID of the issue. Required, unless `issueKey` or `project` is specified. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return. This operation may return less than the maximum number of items even if more are available. The operation fetches users up to the maximum and then, from the fetched users, returns only the users that can be assigned to the issue. |
| `actionDescriptorId` | `?int` | The ID of the transition. |
| `recommend` | `?bool` |  |

#### Response


## Find Users With Permissions
<a name="findUsersWithAllPermissions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-search/#api-rest-api-3-user-permission-search-get

Returns a list of users who fulfill these criteria:

 - their user attributes match a search string
 - they have a set of permissions for a project or issue

If no search string is provided, a list of all users with the permissions is returned

This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the search string and have permission for the project or issue.
This means the operation usually returns fewer users than specified in `maxResults`.
To get all the users who match the search string and have permission for the project or issue, use "Get all users" and filter the records in your code

Privacy controls are applied to the response based on the users' preferences.
This could mean, for example, that the user's email address is hidden.
See the "Profile visibility overview" for more details

This operation can be accessed anonymously

**"Permissions" required:**

 - *Administer Jira* "global permission", to get users for any project
 - *Administer Projects* "project permission" for a project, to get users for that project.
See: https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->findUsersWithAllPermissions(
    permissions: 'foo',
    query: 'query',
    username: null,
    accountId: null,
    issueKey: null,
    projectKey: null,
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `permissions` | `string` | A comma separated list of permissions. Permissions can be specified as any:<br/><br/> *  permission returned by [Get all permissions](#api-rest-api-3-permissions-get).<br/> *  custom project permission added by Connect apps.<br/> *  (deprecated) one of the following:<br/>    <br/>     *  ASSIGNABLE\_USER<br/>     *  ASSIGN\_ISSUE<br/>     *  ATTACHMENT\_DELETE\_ALL<br/>     *  ATTACHMENT\_DELETE\_OWN<br/>     *  BROWSE<br/>     *  CLOSE\_ISSUE<br/>     *  COMMENT\_DELETE\_ALL<br/>     *  COMMENT\_DELETE\_OWN<br/>     *  COMMENT\_EDIT\_ALL<br/>     *  COMMENT\_EDIT\_OWN<br/>     *  COMMENT\_ISSUE<br/>     *  CREATE\_ATTACHMENT<br/>     *  CREATE\_ISSUE<br/>     *  DELETE\_ISSUE<br/>     *  EDIT\_ISSUE<br/>     *  LINK\_ISSUE<br/>     *  MANAGE\_WATCHER\_LIST<br/>     *  MODIFY\_REPORTER<br/>     *  MOVE\_ISSUE<br/>     *  PROJECT\_ADMIN<br/>     *  RESOLVE\_ISSUE<br/>     *  SCHEDULE\_ISSUE<br/>     *  SET\_ISSUE\_SECURITY<br/>     *  TRANSITION\_ISSUE<br/>     *  VIEW\_VERSION\_CONTROL<br/>     *  VIEW\_VOTERS\_AND\_WATCHERS<br/>     *  VIEW\_WORKFLOW\_READONLY<br/>     *  WORKLOG\_DELETE\_ALL<br/>     *  WORKLOG\_DELETE\_OWN<br/>     *  WORKLOG\_EDIT\_ALL<br/>     *  WORKLOG\_EDIT\_OWN<br/>     *  WORK\_ISSUE |
| `query` | `?string` | A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` is specified. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `accountId` | `?string` | A query string that is matched exactly against user `accountId`. Required, unless `query` is specified. |
| `issueKey` | `?string` | The issue key for the issue. |
| `projectKey` | `?string` | The project key for the project (case sensitive). |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response


## Find Users For Picker
<a name="findUsersForPicker"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-search/#api-rest-api-3-user-picker-get

Returns a list of users whose attributes match the query term.
The returned object includes the `html` field where the matched query term is highlighted with the HTML strong tag.
A list of account IDs can be provided to exclude users from the results

This operation takes the users in the range defined by `maxResults`, up to the thousandth user, and then returns only the users from that range that match the query term.
This means the operation usually returns fewer users than specified in `maxResults`.
To get all the users who match the query term, use "Get all users" and filter the records in your code

Privacy controls are applied to the response based on the users' preferences.
This could mean, for example, that the user's email address is hidden.
See the "Profile visibility overview" for more details

This operation can be accessed anonymously

**"Permissions" required:** *Browse users and groups* "global permission".
Anonymous calls and calls by users without the required permission return search results for an exact name match only.
See: https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\FoundUsers $response */
$response = $client->findUsersForPicker(
    query: 'foo',
    maxResults: 50,
    showAvatar: false,
    exclude: null,
    excludeAccountIds: null,
    avatarSize: null,
    excludeConnectUsers: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `query` | `string` | A query string that is matched against user attributes, such as `displayName`, and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. |
| `maxResults` | `?int` | The maximum number of items to return. The total number of matched users is returned in `total`. |
| `showAvatar` | `?bool` | Include the URI to the user's avatar. |
| `exclude` | `?list<string>` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `excludeAccountIds` | `?list<string>` | A list of account IDs to exclude from the search results. This parameter accepts a comma-separated list. Multiple account IDs can also be provided using an ampersand-separated list. For example, `excludeAccountIds=5b10a2844c20165700ede21g,5b10a0effa615349cb016cd8&excludeAccountIds=5b10ac8d82e05b22cc7d4ef5`. Cannot be provided with `exclude`. |
| `avatarSize` | `?string` |  |
| `excludeConnectUsers` | `?bool` |  |

#### Response

Source: [`Jira\Client\Schema\FoundUsers`](/docs/schema/found-users.md)

The list of users found in a search, including header text (Showing X of Y matching users) and total of matched users.

| Property | Type | Description |
| --- | --- | --- |
| `header` | `string` | Header text indicating the number of users in the response and the total number of users found in the search. |
| `total` | `int` | The total number of users found in the search. |
| `users` | [`?list<UserPickerUser>`](/docs/schema/user-picker-user.md) |  |


## Find Users
<a name="findUsers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-search/#api-rest-api-3-user-search-get

Returns a list of active users that match the search string and property

This operation first applies a filter to match the search string and property, and then takes the filtered users in the range defined by `startAt` and `maxResults`, up to the thousandth user.
To get all the users who match the search string and property, use "Get all users" and filter the records in your code

This operation can be accessed anonymously

Privacy controls are applied to the response based on the users' preferences.
This could mean, for example, that the user's email address is hidden.
See the "Profile visibility overview" for more details

**"Permissions" required:** *Browse users and groups* "global permission".
Anonymous calls or calls by users without the required permission return empty search results.
See: https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->findUsers(
    query: 'query',
    username: null,
    accountId: null,
    startAt: 0,
    maxResults: 50,
    property: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `query` | `?string` | A query string that is matched against user attributes ( `displayName`, and `emailAddress`) to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` or `property` is specified. |
| `username` | `?string` |  |
| `accountId` | `?string` | A query string that is matched exactly against a user `accountId`. Required, unless `query` or `property` is specified. |
| `startAt` | `?int` | The index of the first item to return in a page of filtered results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `property` | `?string` | A query string used to search properties. Property keys are specified by path, so property keys containing dot (.) or equals (=) characters cannot be used. The query string cannot be specified using a JSON object. Example: To search for the value of `nested` from `{"something":{"nested":1,"other":2}}` use `thepropertykey.something.nested=1`. Required, unless `accountId` or `query` is specified. |

#### Response


## Find Users By Query
<a name="findUsersByQuery"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-search/#api-rest-api-3-user-search-query-get

Finds users with a structured query and returns a "paginated" list of user details

This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the structured query.
This means the operation usually returns fewer users than specified in `maxResults`.
To get all the users who match the structured query, use "Get all users" and filter the records in your code

**"Permissions" required:** *Browse users and groups* "global permission"

The query statements are:

 - `is assignee of PROJ` Returns the users that are assignees of at least one issue in project *PROJ*
 - `is assignee of (PROJ-1, PROJ-2)` Returns users that are assignees on the issues *PROJ-1* or *PROJ-2*
 - `is reporter of (PROJ-1, PROJ-2)` Returns users that are reporters on the issues *PROJ-1* or *PROJ-2*
 - `is watcher of (PROJ-1, PROJ-2)` Returns users that are watchers on the issues *PROJ-1* or *PROJ-2*
 - `is voter of (PROJ-1, PROJ-2)` Returns users that are voters on the issues *PROJ-1* or *PROJ-2*
 - `is commenter of (PROJ-1, PROJ-2)` Returns users that have posted a comment on the issues *PROJ-1* or *PROJ-2*
 - `is transitioner of (PROJ-1, PROJ-2)` Returns users that have performed a transition on issues *PROJ-1* or *PROJ-2*
 - `[propertyKey].entity.property.path is "property value"` Returns users with the entity property value.
For example, if user property `location` is set to value `{"office": {"country": "AU", "city": "Sydney"}}`, then it's possible to use `[location].office.city is "Sydney"` to match the user

The list of issues can be extended as needed, as in *(PROJ-1, PROJ-2, ...
PROJ-n)*.
Statements can be combined using the `AND` and `OR` operators to form more complex queries.
For example:

`is assignee of PROJ AND [propertyKey].entity.property.path is "property value"`
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `query` | `string` | The search query. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanUser`](/docs/schema/page-bean-user.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<User>`](/docs/schema/user.md) | The list of items. |


## Find User Keys By Query
<a name="findUserKeysByQuery"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-search/#api-rest-api-3-user-search-query-key-get

Finds users with a structured query and returns a "paginated" list of user keys

This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the structured query.
This means the operation usually returns fewer users than specified in `maxResults`.
To get all the users who match the structured query, use "Get all users" and filter the records in your code

**"Permissions" required:** *Browse users and groups* "global permission"

The query statements are:

 - `is assignee of PROJ` Returns the users that are assignees of at least one issue in project *PROJ*
 - `is assignee of (PROJ-1, PROJ-2)` Returns users that are assignees on the issues *PROJ-1* or *PROJ-2*
 - `is reporter of (PROJ-1, PROJ-2)` Returns users that are reporters on the issues *PROJ-1* or *PROJ-2*
 - `is watcher of (PROJ-1, PROJ-2)` Returns users that are watchers on the issues *PROJ-1* or *PROJ-2*
 - `is voter of (PROJ-1, PROJ-2)` Returns users that are voters on the issues *PROJ-1* or *PROJ-2*
 - `is commenter of (PROJ-1, PROJ-2)` Returns users that have posted a comment on the issues *PROJ-1* or *PROJ-2*
 - `is transitioner of (PROJ-1, PROJ-2)` Returns users that have performed a transition on issues *PROJ-1* or *PROJ-2*
 - `[propertyKey].entity.property.path is "property value"` Returns users with the entity property value.
For example, if user property `location` is set to value `{"office": {"country": "AU", "city": "Sydney"}}`, then it's possible to use `[location].office.city is "Sydney"` to match the user

The list of issues can be extended as needed, as in *(PROJ-1, PROJ-2, ...
PROJ-n)*.
Statements can be combined using the `AND` and `OR` operators to form more complex queries.
For example:

`is assignee of PROJ AND [propertyKey].entity.property.path is "property value"`
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `query` | `string` | The search query. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResult` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanUserKey`](/docs/schema/page-bean-user-key.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<UserKey>`](/docs/schema/user-key.md) | The list of items. |


## Find Users With Browse Permission
<a name="findUsersWithBrowsePermission"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-user-search/#api-rest-api-3-user-viewissue-search-get

Returns a list of users who fulfill these criteria:

 - their user attributes match a search string
 - they have permission to browse issues

Use this resource to find users who can browse:

 - an issue, by providing the `issueKey`
 - any issue in a project, by providing the `projectKey`

This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the search string and have permission to browse issues.
This means the operation usually returns fewer users than specified in `maxResults`.
To get all the users who match the search string and have permission to browse issues, use "Get all users" and filter the records in your code

Privacy controls are applied to the response based on the users' preferences.
This could mean, for example, that the user's email address is hidden.
See the "Profile visibility overview" for more details

This operation can be accessed anonymously

**"Permissions" required:** *Browse users and groups* "global permission".
Anonymous calls and calls by users without the required permission return empty search results.
See: https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->findUsersWithBrowsePermission(
    query: 'query',
    username: null,
    accountId: null,
    issueKey: null,
    projectKey: null,
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `query` | `?string` | A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` is specified. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `accountId` | `?string` | A query string that is matched exactly against user `accountId`. Required, unless `query` is specified. |
| `issueKey` | `?string` | The issue key for the issue. Required, unless `projectKey` is specified. |
| `projectKey` | `?string` | The project key for the project (case sensitive). Required, unless `issueKey` is specified. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response
