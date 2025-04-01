# Users

Source: [`Jira\Client\Operations\Users`](/src/Operations/Users.php)

## Operations

- [Get User](#getUser)
- [Create User](#createUser)
- [Delete User](#removeUser)
- [Bulk Get Users](#bulkGetUsers)
- [Get Account IDs For Users](#bulkGetUsersMigration)
- [Get User Default Columns](#getUserDefaultColumns)
- [Set User Default Columns](#setUserColumns)
- [Reset User Default Columns](#resetUserColumns)
- [Get User Email](#getUserEmail)
- [Get User Email Bulk](#getUserEmailBulk)
- [Get User Groups](#getUserGroups)
- [Get All Users Default](#getAllUsersDefault)
- [Get All Users](#getAllUsers)

## Get User
<a name="getUser"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-get

Returns a user

Privacy controls are applied to the response based on the user's preferences.
This could mean, for example, that the user's email address is hidden.
See the "Profile visibility overview" for more details

**"Permissions" required:** *Browse users and groups* "global permission".
See: https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\User $response */
$response = $client->getUser(
    accountId: '5b10ac8d82e05b22cc7d4ef5',
    username: null,
    key: null,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide) for details. |
| `key` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide) for details. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about users in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `groups` includes all groups and nested groups to which the user belongs.<br/> *  `applicationRoles` includes details of all the applications to which the user has access. |

#### Response

Source: [`Jira\Client\Schema\User`](/docs/schema/user.md)

A user with details as permitted by the user's Atlassian Account privacy settings.
However, be aware of these exceptions:

 - User record deleted from Atlassian: This occurs as the result of a right to be forgotten request.
In this case, `displayName` provides an indication and other parameters have default values or are blank (for example, email is blank)
 - User record corrupted: This occurs as a results of events such as a server import and can only happen to deleted users.
In this case, `accountId` returns *unknown* and all other parameters have fallback values
 - User record unavailable: This usually occurs due to an internal service outage.
In this case, all parameters have fallback values.

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required in requests. |
| `accountType` | `'atlassian'\|`<br/>`'app'\|`<br/>`'customer'\|`<br/>`'unknown'\|`<br/>`null` | The user account type. Can take the following values:<br/><br/> *  `atlassian` regular Atlassian user account<br/> *  `app` system account used for Connect applications and OAuth to represent external systems<br/> *  `customer` Jira Service Desk account representing an external service desk |
| `active` | `bool` | Whether the user is active. |
| `applicationRoles` | [`SimpleListWrapperApplicationRole`](/docs/schema/simple-list-wrapper-application-role.md) | The application roles the user is assigned to. |
| `avatarUrls` | [`AvatarUrlsBean`](/docs/schema/avatar-urls-bean.md) | The avatars of the user. |
| `displayName` | `string` | The display name of the user. Depending on the user’s privacy setting, this may return an alternative value. |
| `emailAddress` | `string` | The email address of the user. Depending on the user’s privacy setting, this may be returned as null. |
| `expand` | `string` | Expand options that include additional user details in the response. |
| `groups` | [`SimpleListWrapperGroupName`](/docs/schema/simple-list-wrapper-group-name.md) | The groups that the user belongs to. |
| `key` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `locale` | `string` | The locale of the user. Depending on the user’s privacy setting, this may be returned as null. |
| `name` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `self` | `string` | The URL of the user. |
| `timeZone` | `string` | The time zone specified in the user's profile. If the user's time zone is not visible to the current user (due to user's profile setting), or if a time zone has not been set, the instance's default time zone will be returned. |


## Create User
<a name="createUser"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-post

Creates a user.
This resource is retained for legacy compatibility.
As soon as a more suitable alternative is available this resource will be deprecated

If the user exists and has access to Jira, the operation returns a 201 status.
If the user exists but does not have access to Jira, the operation returns a 400 status

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\User $response */
$response = $client->createUser(new Schema\NewUserDetails(
    emailAddress: 'mia@atlassian.com',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\NewUserDetails`](/docs/schema/new-user-details.md)

The user details.

| Property | Type | Description |
| --- | --- | --- |
| `emailAddress` | `string` | The email address for the user. |
| `products` | `list<string>` | Products the new user has access to. Valid products are: jira-core, jira-servicedesk, jira-product-discovery, jira-software. To create a user without product access, set this field to be an empty array. |
| `applicationKeys` | `?list<string>` | Deprecated, do not use. |
| `displayName` | `string` | This property is no longer available. If the user has an Atlassian account, their display name is not changed. If the user does not have an Atlassian account, they are sent an email asking them set up an account. |
| `key` | `string` | This property is no longer available. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `name` | `string` | This property is no longer available. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `password` | `string` | This property is no longer available. If the user has an Atlassian account, their password is not changed. If the user does not have an Atlassian account, they are sent an email asking them set up an account. |
| `self` | `string` | The URL of the user. |

#### Response

Source: [`Jira\Client\Schema\User`](/docs/schema/user.md)

A user with details as permitted by the user's Atlassian Account privacy settings.
However, be aware of these exceptions:

 - User record deleted from Atlassian: This occurs as the result of a right to be forgotten request.
In this case, `displayName` provides an indication and other parameters have default values or are blank (for example, email is blank)
 - User record corrupted: This occurs as a results of events such as a server import and can only happen to deleted users.
In this case, `accountId` returns *unknown* and all other parameters have fallback values
 - User record unavailable: This usually occurs due to an internal service outage.
In this case, all parameters have fallback values.

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required in requests. |
| `accountType` | `'atlassian'\|`<br/>`'app'\|`<br/>`'customer'\|`<br/>`'unknown'\|`<br/>`null` | The user account type. Can take the following values:<br/><br/> *  `atlassian` regular Atlassian user account<br/> *  `app` system account used for Connect applications and OAuth to represent external systems<br/> *  `customer` Jira Service Desk account representing an external service desk |
| `active` | `bool` | Whether the user is active. |
| `applicationRoles` | [`SimpleListWrapperApplicationRole`](/docs/schema/simple-list-wrapper-application-role.md) | The application roles the user is assigned to. |
| `avatarUrls` | [`AvatarUrlsBean`](/docs/schema/avatar-urls-bean.md) | The avatars of the user. |
| `displayName` | `string` | The display name of the user. Depending on the user’s privacy setting, this may return an alternative value. |
| `emailAddress` | `string` | The email address of the user. Depending on the user’s privacy setting, this may be returned as null. |
| `expand` | `string` | Expand options that include additional user details in the response. |
| `groups` | [`SimpleListWrapperGroupName`](/docs/schema/simple-list-wrapper-group-name.md) | The groups that the user belongs to. |
| `key` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `locale` | `string` | The locale of the user. Depending on the user’s privacy setting, this may be returned as null. |
| `name` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `self` | `string` | The URL of the user. |
| `timeZone` | `string` | The time zone specified in the user's profile. If the user's time zone is not visible to the current user (due to user's profile setting), or if a time zone has not been set, the instance's default time zone will be returned. |


## Delete User
<a name="removeUser"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-delete

Deletes a user.
If the operation completes successfully then the user is removed from Jira's user base.
This operation does not delete the user's Atlassian account

**"Permissions" required:** Site administration (that is, membership of the *site-admin* "group").
See: https://confluence.atlassian.com/x/24xjL

### Example

```php
/** @var true $response */
$response = $client->removeUser(
    accountId: '5b10ac8d82e05b22cc7d4ef5',
    username: null,
    key: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `key` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response

`true`
## Bulk Get Users
<a name="bulkGetUsers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-bulk-get

Returns a "paginated" list of the users specified by one or more account IDs

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanUser $response */
$response = $client->bulkGetUsers(
    accountId: json_decode('["5b10ac8d82e05b22cc7d4ef5"]', true),
    startAt: 0,
    maxResults: 10,
    username: null,
    key: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `list<string>` | The account ID of a user. To specify multiple users, pass multiple `accountId` parameters. For example, `accountId=5b10a2844c20165700ede21g&accountId=5b10ac8d82e05b22cc7d4ef5`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `username` | `?list<string>` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `key` | `?list<string>` | This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

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


## Get Account IDs For Users
<a name="bulkGetUsersMigration"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-bulk-migration-get

Returns the account IDs for the users specified in the `key` or `username` parameters.
Note that multiple `key` or `username` parameters can be specified

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var array $response */
$response = $client->bulkGetUsersMigration(
    startAt: 0,
    maxResults: 10,
    username: null,
    key: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `username` | `?list<string>` | Username of a user. To specify multiple users, pass multiple copies of this parameter. For example, `username=fred&username=barney`. Required if `key` isn't provided. Cannot be provided if `key` is present. |
| `key` | `?list<string>` | Key of a user. To specify multiple users, pass multiple copies of this parameter. For example, `key=fred&key=barney`. Required if `username` isn't provided. Cannot be provided if `username` is present. |

#### Response


## Get User Default Columns
<a name="getUserDefaultColumns"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-columns-get

Returns the default "issue table columns" for the user.
If `accountId` is not passed in the request, the calling user's details are returned

**"Permissions" required:**

 - *Administer Jira* "global permission", to get the column details for any user
 - Permission to access Jira, to get the calling user's column details.
See: https://confluence.atlassian.com/x/XYdKLg
See: https://confluence.atlassian.com/x/x4dKLgl


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `username` | `?string` | This parameter is no longer available See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response


## Set User Default Columns
<a name="setUserColumns"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-columns-put

Sets the default " issue table columns" for the user.
If an account ID is not passed, the calling user's default columns are set.
If no column details are sent, then all default columns are removed

The parameters for this resource are expressed as HTML form data.
For example, in curl:

`curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/user/columns?accountId=5b10ac8d82e05b22cc7d4ef5'`

**"Permissions" required:**

 - *Administer Jira* "global permission", to set the columns on any user
 - Permission to access Jira, to set the calling user's columns.
See: https://confluence.atlassian.com/x/XYdKLg
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |

#### Response

`true`
## Reset User Default Columns
<a name="resetUserColumns"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-columns-delete

Resets the default " issue table columns" for the user to the system default.
If `accountId` is not passed, the calling user's default columns are reset

**"Permissions" required:**

 - *Administer Jira* "global permission", to set the columns on any user
 - Permission to access Jira, to set the calling user's columns.
See: https://confluence.atlassian.com/x/XYdKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->resetUserColumns(
    accountId: '5b10ac8d82e05b22cc7d4ef5',
    username: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `?string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response

`true`
## Get User Email
<a name="getUserEmail"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-email-get

Returns a user's email address regardless of the user's profile visibility settings.
For Connect apps, this API is only available to apps approved by Atlassian, according to these "guidelines".
For Forge apps, this API only supports access via asApp() requests.
See: https://community.developer.atlassian.com/t/guidelines-for-requesting-access-to-email-address/27603

### Example

```php
/** @var Schema\UnrestrictedUserEmail $response */
$response = $client->getUserEmail(
    accountId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, `5b10ac8d82e05b22cc7d4ef5`. |

#### Response

Source: [`Jira\Client\Schema\UnrestrictedUserEmail`](/docs/schema/unrestricted-user-email.md)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The accountId of the user |
| `email` | `string` | The email of the user |


## Get User Email Bulk
<a name="getUserEmailBulk"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-email-bulk-get

Returns a user's email address regardless of the user's profile visibility settings.
For Connect apps, this API is only available to apps approved by Atlassian, according to these "guidelines".
For Forge apps, this API only supports access via asApp() requests.
See: https://community.developer.atlassian.com/t/guidelines-for-requesting-access-to-email-address/27603


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `list<string>` | The account IDs of the users for which emails are required. An `accountId` is an identifier that uniquely identifies the user across all Atlassian products. For example, `5b10ac8d82e05b22cc7d4ef5`. Note, this should be treated as an opaque identifier (that is, do not assume any structure in the value). |

#### Response

Source: [`Jira\Client\Schema\UnrestrictedUserEmail`](/docs/schema/unrestricted-user-email.md)

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The accountId of the user |
| `email` | `string` | The email of the user |


## Get User Groups
<a name="getUserGroups"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-user-groups-get

Returns the groups to which a user belongs

**"Permissions" required:** *Browse users and groups* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getUserGroups(
    accountId: '5b10ac8d82e05b22cc7d4ef5',
    username: null,
    key: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `accountId` | `string` | The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `username` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `key` | `?string` | This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |

#### Response


## Get All Users Default
<a name="getAllUsersDefault"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-users-get

Returns a list of all users, including active users, inactive users and previously deleted users that have an Atlassian account

Privacy controls are applied to the response based on the users' preferences.
This could mean, for example, that the user's email address is hidden.
See the "Profile visibility overview" for more details

**"Permissions" required:** *Browse users and groups* "global permission".
See: https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getAllUsersDefault(
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return. |
| `maxResults` | `?int` | The maximum number of items to return. |

#### Response


## Get All Users
<a name="getAllUsers"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-users/#api-rest-api-3-users-search-get

Returns a list of all users, including active users, inactive users and previously deleted users that have an Atlassian account

Privacy controls are applied to the response based on the users' preferences.
This could mean, for example, that the user's email address is hidden.
See the "Profile visibility overview" for more details

**"Permissions" required:** *Browse users and groups* "global permission".
See: https://developer.atlassian.com/cloud/jira/platform/profile-visibility/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var array $response */
$response = $client->getAllUsers(
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return. |
| `maxResults` | `?int` | The maximum number of items to return. |

#### Response
