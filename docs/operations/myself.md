# Myself

Source: [`Jira\Client\Operations\Myself`](/src/Operations/Myself.php)

## Operations

- [Get Preference](#getPreference)
- [Set Preference](#setPreference)
- [Delete Preference](#removePreference)
- [Get Locale](#getLocale)
- [Set Locale](#setLocale)
- [Delete Locale](#deleteLocale)
- [Get Current User](#getCurrentUser)

## Get Preference
<a name="getPreference"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-myself/#api-rest-api-3-mypreferences-get

Returns the value of a preference of the current user

Note that these keys are deprecated:

 - *jira.user.locale* The locale of the user.
By default this is not set and the user takes the locale of the instance
 - *jira.user.timezone* The time zone of the user.
By default this is not set and the user takes the timezone of the instance

These system preferences keys will be deprecated by 15/07/2024.
You can still retrieve these keys, but it will not have any impact on Notification behaviour

 - *user.notifications.watcher* Whether the user gets notified when they are watcher
 - *user.notifications.assignee* Whether the user gets notified when they are assignee
 - *user.notifications.reporter* Whether the user gets notified when they are reporter
 - *user.notifications.mentions* Whether the user gets notified when they are mentions

Use " Update a user profile" from the user management REST API to manage timezone and locale instead

**"Permissions" required:** Permission to access Jira.
See: https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the preference. |

#### Response

`true`
## Set Preference
<a name="setPreference"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-myself/#api-rest-api-3-mypreferences-put

Creates a preference for the user or updates a preference's value by sending a plain text string.
For example, `false`.
An arbitrary preference can be created with the value containing up to 255 characters.
In addition, the following keys define system preferences that can be set or created:

 - *user.notifications.mimetype* The mime type used in notifications sent to the user.
Defaults to `html`
 - *user.default.share.private* Whether new " filters" are set to private.
Defaults to `true`
 - *user.keyboard.shortcuts.disabled* Whether keyboard shortcuts are disabled.
Defaults to `false`
 - *user.autowatch.disabled* Whether the user automatically watches issues they create or add a comment to.
By default, not set: the user takes the instance autowatch setting
 - *user.notifiy.own.changes* Whether the user gets notified of their own changes

Note that these keys are deprecated:

 - *jira.user.locale* The locale of the user.
By default, not set.
The user takes the instance locale
 - *jira.user.timezone* The time zone of the user.
By default, not set.
The user takes the instance timezone

These system preferences keys will be deprecated by 15/07/2024.
You can still use these keys to create arbitrary preferences, but it will not have any impact on Notification behaviour

 - *user.notifications.watcher* Whether the user gets notified when they are watcher
 - *user.notifications.assignee* Whether the user gets notified when they are assignee
 - *user.notifications.reporter* Whether the user gets notified when they are reporter
 - *user.notifications.mentions* Whether the user gets notified when they are mentions

Use " Update a user profile" from the user management REST API to manage timezone and locale instead

**"Permissions" required:** Permission to access Jira.
See: https://confluence.atlassian.com/x/eQiiLQ
See: https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch

### Example

```php
/** @var true $response */
$response = $client->setPreference(
    key: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the preference. The maximum length is 255 characters. |

#### Response

`true`
## Delete Preference
<a name="removePreference"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-myself/#api-rest-api-3-mypreferences-delete

Deletes a preference of the user, which restores the default value of system defined settings

Note that these keys are deprecated:

 - *jira.user.locale* The locale of the user.
By default, not set.
The user takes the instance locale
 - *jira.user.timezone* The time zone of the user.
By default, not set.
The user takes the instance timezone

Use " Update a user profile" from the user management REST API to manage timezone and locale instead

**"Permissions" required:** Permission to access Jira.
See: https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch

### Example

```php
/** @var true $response */
$response = $client->removePreference(
    key: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the preference. |

#### Response

`true`
## Get Locale
<a name="getLocale"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-myself/#api-rest-api-3-mypreferences-locale-get

Returns the locale for the user

If the user has no language preference set (which is the default setting) or this resource is accessed anonymous, the browser locale detected by Jira is returned.
Jira detects the browser locale using the *Accept-Language* header in the request.
However, if this doesn't match a locale available Jira, the site default locale is returned

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
/** @var Schema\Locale $response */
$response = $client->getLocale();
```

### Request

#### Response

Source: [`Jira\Client\Schema\Locale`](/docs/schema/locale.md)

Details of a locale.

| Property | Type | Description |
| --- | --- | --- |
| `locale` | `string` | The locale code. The Java the locale format is used: a two character language code (ISO 639), an underscore, and two letter country code (ISO 3166). For example, en\_US represents a locale of English (United States). Required on create. |


## Set Locale
<a name="setLocale"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-myself/#api-rest-api-3-mypreferences-locale-put

Deprecated, use " Update a user profile" from the user management REST API instead

Sets the locale of the user.
The locale must be one supported by the instance of Jira

**"Permissions" required:** Permission to access Jira.
See: https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->setLocale(new Schema\Locale(
    locale: 'en_US',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\Locale`](/docs/schema/locale.md)

Details of a locale.

| Property | Type | Description |
| --- | --- | --- |
| `locale` | `string` | The locale code. The Java the locale format is used: a two character language code (ISO 639), an underscore, and two letter country code (ISO 3166). For example, en\_US represents a locale of English (United States). Required on create. |

#### Response

`true`
## Delete Locale
<a name="deleteLocale"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-myself/#api-rest-api-3-mypreferences-locale-delete

Deprecated, use " Update a user profile" from the user management REST API instead

Deletes the locale of the user, which restores the default setting

**"Permissions" required:** Permission to access Jira.
See: https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch

### Example

```php
/** @var true $response */
$response = $client->deleteLocale();
```

### Request

#### Response

`true`
## Get Current User
<a name="getCurrentUser"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-myself/#api-rest-api-3-myself-get

Returns details for the current user

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\User $response */
$response = $client->getCurrentUser(
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about user in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `groups` Returns all groups, including nested groups, the user belongs to.<br/> *  `applicationRoles` Returns the application roles the user is assigned to. |

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
