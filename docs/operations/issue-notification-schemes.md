# Issue Notification Schemes

Source: [`Jira\Client\Operations\IssueNotificationSchemes`](/src/Operations/IssueNotificationSchemes.php)

## Operations

- [Get Notification Schemes Paginated](#getNotificationSchemes)
- [Create Notification Scheme](#createNotificationScheme)
- [Get Projects Using Notification Schemes Paginated](#getNotificationSchemeToProjectMappings)
- [Get Notification Scheme](#getNotificationScheme)
- [Update Notification Scheme](#updateNotificationScheme)
- [Add Notifications To Notification Scheme](#addNotifications)
- [Delete Notification Scheme](#deleteNotificationScheme)
- [Remove Notification From Notification Scheme](#removeNotificationFromNotificationScheme)

## Get Notification Schemes Paginated
<a name="getNotificationSchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-notification-schemes/#api-rest-api-3-notificationscheme-get

Returns a "paginated" list of "notification schemes" ordered by the display name

*Note that you should allow for events without recipients to appear in responses.*

**"Permissions" required:** Permission to access Jira, however, the user must have permission to administer at least one project associated with a notification scheme for it to be returned.
See: https://confluence.atlassian.com/x/8YdKLg

### Example

```php
/** @var Schema\PageBeanNotificationScheme $response */
$response = $client->getNotificationSchemes(
    startAt: 0,
    maxResults: 50,
    id: null,
    projectId: null,
    onlyDefault: false,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `id` | `?list<string>` | The list of notification schemes IDs to be filtered by |
| `projectId` | `?list<string>` | The list of projects IDs to be filtered by |
| `onlyDefault` | `?bool` | When set to true, returns only the default notification scheme. If you provide project IDs not associated with the default, returns an empty page. The default value is false. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `all` Returns all expandable information<br/> *  `field` Returns information about any custom fields assigned to receive an event<br/> *  `group` Returns information about any groups assigned to receive an event<br/> *  `notificationSchemeEvents` Returns a list of event associations. This list is returned for all expandable information<br/> *  `projectRole` Returns information about any project roles assigned to receive an event<br/> *  `user` Returns information about any users assigned to receive an event |

#### Response

Source: [`Jira\Client\Schema\PageBeanNotificationScheme`](/docs/schema/page-bean-notification-scheme.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<NotificationScheme>`](/docs/schema/notification-scheme.md) | The list of items. |


## Create Notification Scheme
<a name="createNotificationScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-notification-schemes/#api-rest-api-3-notificationscheme-post

Creates a notification scheme with notifications.
You can create up to 1000 notifications per request

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\NotificationSchemeId $response */
$response = $client->createNotificationScheme(new Schema\CreateNotificationSchemeDetails(
    description: 'My new scheme description',
    name: 'My new notification scheme',
    notificationSchemeEvents: [
                [
                    'event' => [
                        'id' => '1',
                    ],
                    'notifications' => [
                        [
                            'notificationType' => 'Group',
                            'parameter' => 'jira-administrators',
                        ],
                    ],
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateNotificationSchemeDetails`](/docs/schema/create-notification-scheme-details.md)

Details of an notification scheme.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the notification scheme. Must be unique (case-insensitive). |
| `description` | `string` | The description of the notification scheme. |
| `notificationSchemeEvents` | [`?list<NotificationSchemeEventDetails>`](/docs/schema/notification-scheme-event-details.md) | The list of notifications which should be added to the notification scheme. |

#### Response

Source: [`Jira\Client\Schema\NotificationSchemeId`](/docs/schema/notification-scheme-id.md)

The ID of a notification scheme.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of a notification scheme. |


## Get Projects Using Notification Schemes Paginated
<a name="getNotificationSchemeToProjectMappings"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-notification-schemes/#api-rest-api-3-notificationscheme-project-get

Returns a "paginated" mapping of project that have notification scheme assigned.
You can provide either one or multiple notification scheme IDs or project IDs to filter by.
If you don't provide any, this will return a list of all mappings.
Note that only company-managed (classic) projects are supported.
This is because team-managed projects don't have a concept of a default notification scheme.
The mappings are ordered by projectId

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanNotificationSchemeAndProjectMappingJsonBean $response */
$response = $client->getNotificationSchemeToProjectMappings(
    startAt: 0,
    maxResults: 50,
    notificationSchemeId: null,
    projectId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?string` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?string` | The maximum number of items to return per page. |
| `notificationSchemeId` | `?list<string>` | The list of notifications scheme IDs to be filtered out |
| `projectId` | `?list<string>` | The list of project IDs to be filtered out |

#### Response

Source: [`Jira\Client\Schema\PageBeanNotificationSchemeAndProjectMappingJsonBean`](/docs/schema/page-bean-notification-scheme-and-project-mapping-json-bean.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<NotificationSchemeAndProjectMappingJsonBean>`](/docs/schema/notification-scheme-and-project-mapping-json-bean.md) | The list of items. |


## Get Notification Scheme
<a name="getNotificationScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-notification-schemes/#api-rest-api-3-notificationscheme-id-get

Returns a "notification scheme", including the list of events and the recipients who will receive notifications for those events

**"Permissions" required:** Permission to access Jira, however, the user must have permission to administer at least one project associated with the notification scheme.
See: https://confluence.atlassian.com/x/8YdKLg

### Example

```php
/** @var Schema\NotificationScheme $response */
$response = $client->getNotificationScheme(
    id: 1234,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the notification scheme. Use [Get notification schemes paginated](#api-rest-api-3-notificationscheme-get) to get a list of notification scheme IDs. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `all` Returns all expandable information<br/> *  `field` Returns information about any custom fields assigned to receive an event<br/> *  `group` Returns information about any groups assigned to receive an event<br/> *  `notificationSchemeEvents` Returns a list of event associations. This list is returned for all expandable information<br/> *  `projectRole` Returns information about any project roles assigned to receive an event<br/> *  `user` Returns information about any users assigned to receive an event |

#### Response

Source: [`Jira\Client\Schema\NotificationScheme`](/docs/schema/notification-scheme.md)

Details about a notification scheme.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the notification scheme. |
| `expand` | `string` | Expand options that include additional notification scheme details in the response. |
| `id` | `int` | The ID of the notification scheme. |
| `name` | `string` | The name of the notification scheme. |
| `notificationSchemeEvents` | [`?list<NotificationSchemeEvent>`](/docs/schema/notification-scheme-event.md) | The notification events and associated recipients. |
| `projects` | `?list<int>` | The list of project IDs associated with the notification scheme. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the notification scheme. |
| `self` | `string` |  |


## Update Notification Scheme
<a name="updateNotificationScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-notification-schemes/#api-rest-api-3-notificationscheme-id-put

Updates a notification scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateNotificationScheme(
    request: new Schema\UpdateNotificationSchemeDetails(
        description: 'My updated notification scheme description',
        name: 'My updated notification scheme',
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateNotificationSchemeDetails`](/docs/schema/update-notification-scheme-details.md)

Details of a notification scheme.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the notification scheme. |
| `name` | `string` | The name of the notification scheme. Must be unique. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the notification scheme. |

#### Response

`true`
## Add Notifications To Notification Scheme
<a name="addNotifications"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-notification-schemes/#api-rest-api-3-notificationscheme-id-notification-put

Adds notifications to a notification scheme.
You can add up to 1000 notifications per request

*Deprecated: The notification type `EmailAddress` is no longer supported in Cloud.
Refer to the "changelog" for more details.*

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-1031
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->addNotifications(
    request: new Schema\AddNotificationsDetails(
        notificationSchemeEvents: [
                [
                    'event' => [
                        'id' => '1',
                    ],
                    'notifications' => [
                        [
                            'notificationType' => 'Group',
                            'parameter' => 'jira-administrators',
                        ],
                    ],
                ],
            ],
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\AddNotificationsDetails`](/docs/schema/add-notifications-details.md)

Details of notifications which should be added to the notification scheme.

| Property | Type | Description |
| --- | --- | --- |
| `notificationSchemeEvents` | [`list<NotificationSchemeEventDetails>`](/docs/schema/notification-scheme-event-details.md) | The list of notifications which should be added to the notification scheme. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the notification scheme. |

#### Response

`true`
## Delete Notification Scheme
<a name="deleteNotificationScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-notification-schemes/#api-rest-api-3-notificationscheme-notification-scheme-id-delete

Deletes a notification scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteNotificationScheme(
    notificationSchemeId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `notificationSchemeId` | `string` | The ID of the notification scheme. |

#### Response

`true`
## Remove Notification From Notification Scheme
<a name="removeNotificationFromNotificationScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-notification-schemes/#api-rest-api-3-notificationscheme-notification-scheme-id-notification-notification-id-delete

Removes a notification from a notification scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->removeNotificationFromNotificationScheme(
    notificationSchemeId: 'foo',
    notificationId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `notificationSchemeId` | `string` | The ID of the notification scheme. |
| `notificationId` | `string` | The ID of the notification. |

#### Response

`true`
