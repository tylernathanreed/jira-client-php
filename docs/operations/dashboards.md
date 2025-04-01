# Dashboards

Source: [`Jira\Client\Operations\Dashboards`](/src/Operations/Dashboards.php)

## Operations

- [Get All Dashboards](#getAllDashboards)
- [Create Dashboard](#createDashboard)
- [Bulk Edit Dashboards](#bulkEditDashboards)
- [Get Available Gadgets](#getAllAvailableDashboardGadgets)
- [Search For Dashboards](#getDashboardsPaginated)
- [Get Gadgets](#getAllGadgets)
- [Add Gadget To Dashboard](#addGadget)
- [Update Gadget On Dashboard](#updateGadget)
- [Remove Gadget From Dashboard](#removeGadget)
- [Get Dashboard Item Property Keys](#getDashboardItemPropertyKeys)
- [Get Dashboard Item Property](#getDashboardItemProperty)
- [Set Dashboard Item Property](#setDashboardItemProperty)
- [Delete Dashboard Item Property](#deleteDashboardItemProperty)
- [Get Dashboard](#getDashboard)
- [Update Dashboard](#updateDashboard)
- [Delete Dashboard](#deleteDashboard)
- [Copy Dashboard](#copyDashboard)

## Get All Dashboards
<a name="getAllDashboards"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-get

Returns a list of dashboards owned by or shared with the user.
The list may be filtered to include only favorite or owned dashboards

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
/** @var Schema\PageOfDashboards $response */
$response = $client->getAllDashboards(
    filter: null,
    startAt: 0,
    maxResults: 20,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `filter` | `'my'\|'favourite'\|null` | The filter applied to the list of dashboards. Valid values are:<br/><br/> *  `favourite` Returns dashboards the user has marked as favorite.<br/> *  `my` Returns dashboards owned by the user. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageOfDashboards`](/docs/schema/page-of-dashboards.md)

A page containing dashboard details.

| Property | Type | Description |
| --- | --- | --- |
| `dashboards` | [`?list<Dashboard>`](/docs/schema/dashboard.md) | List of dashboards. |
| `maxResults` | `int` | The maximum number of results that could be on the page. |
| `next` | `string` | The URL of the next page of results, if any. |
| `prev` | `string` | The URL of the previous page of results, if any. |
| `startAt` | `int` | The index of the first item returned on the page. |
| `total` | `int` | The number of results on the page. |


## Create Dashboard
<a name="createDashboard"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-post

Creates a dashboard

**"Permissions" required:** None.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Dashboard $response */
$response = $client->createDashboard(
    request: new Schema\DashboardDetails(
        description: 'A dashboard to help auditors identify sample of issues to check.',
        editPermissions: [
            ],
        name: 'Auditors dashboard',
        sharePermissions: [
                [
                    'type' => 'global',
                ],
            ],
    )
    extendAdminPermissions: false,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\DashboardDetails`](/docs/schema/dashboard-details.md)

Details of a dashboard.

| Property | Type | Description |
| --- | --- | --- |
| `editPermissions` | [`list<SharePermission>`](/docs/schema/share-permission.md) | The edit permissions for the dashboard. |
| `name` | `string` | The name of the dashboard. |
| `sharePermissions` | [`list<SharePermission>`](/docs/schema/share-permission.md) | The share permissions for the dashboard. |
| `description` | `string` | The description of the dashboard. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `extendAdminPermissions` | `?bool` | Whether admin level permissions are used. It should only be true if the user has *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) |

#### Response

Source: [`Jira\Client\Schema\Dashboard`](/docs/schema/dashboard.md)

Details of a dashboard.

| Property | Type | Description |
| --- | --- | --- |
| `automaticRefreshMs` | `int` | The automatic refresh interval for the dashboard in milliseconds. |
| `description` | `string` |  |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The details of any edit share permissions for the dashboard. |
| `id` | `string` | The ID of the dashboard. |
| `isFavourite` | `bool` | Whether the dashboard is selected as a favorite by the user. |
| `isWritable` | `bool` | Whether the current user has permission to edit the dashboard. |
| `name` | `string` | The name of the dashboard. |
| `owner` | [`UserBean`](/docs/schema/user-bean.md) | The owner of the dashboard. |
| `popularity` | `int` | The number of users who have this dashboard as a favorite. |
| `rank` | `int` | The rank of this dashboard. |
| `self` | `string` | The URL of these dashboard details. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The details of any view share permissions for the dashboard. |
| `systemDashboard` | `bool` | Whether the current dashboard is system dashboard. |
| `view` | `string` | The URL of the dashboard. |


## Bulk Edit Dashboards
<a name="bulkEditDashboards"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-bulk-edit-put

Bulk edit dashboards.
Maximum number of dashboards to be edited at the same time is 100

**"Permissions" required:** None

The dashboards to be updated must be owned by the user, or the user must be an administrator.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\BulkEditShareableEntityResponse $response */
$response = $client->bulkEditDashboards(new Schema\BulkEditShareableEntityRequest(
    action: 'changePermission',
    entityIds: [
                '10001',
                '10002',
            ],
    extendAdminPermissions: true,
    permissionDetails: [
                'editPermissions' => [
                    0 => [
                        'group' => [
                            'groupId' => '276f955c-63d7-42c8-9520-92d01dca0625',
                            'name' => 'jira-administrators',
                            'self' => 'https://your-domain.atlassian.net/rest/api/~ver~/group?groupId=276f955c-63d7-42c8-9520-92d01dca0625',
                        ],
                        'id' => '10010',
                        'type' => 'group',
                    ],
                ],
                'sharePermissions' => [
                    0 => [
                        'id' => '10000',
                        'type' => 'global',
                    ],
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\BulkEditShareableEntityRequest`](/docs/schema/bulk-edit-shareable-entity-request.md)

Details of a request to bulk edit shareable entity.

| Property | Type | Description |
| --- | --- | --- |
| `action` | `'changeOwner'\|`<br/>`'changePermission'\|`<br/>`'addPermission'\|`<br/>`'removePermission'` | Allowed action for bulk edit shareable entity |
| `entityIds` | `list<int>` | The id list of shareable entities to be changed. |
| `changeOwnerDetails` | [`BulkChangeOwnerDetails`](/docs/schema/bulk-change-owner-details.md) | The details of change owner action. |
| `extendAdminPermissions` | `bool` | Whether the actions are executed by users with Administer Jira global permission. |
| `permissionDetails` | [`PermissionDetails`](/docs/schema/permission-details.md) | The permission details to be changed. |

#### Response

Source: [`Jira\Client\Schema\BulkEditShareableEntityResponse`](/docs/schema/bulk-edit-shareable-entity-response.md)

Details of a request to bulk edit shareable entity.

| Property | Type | Description |
| --- | --- | --- |
| `action` | `'changeOwner'\|`<br/>`'changePermission'\|`<br/>`'addPermission'\|`<br/>`'removePermission'` | Allowed action for bulk edit shareable entity |
| `entityErrors` | [`array<string,BulkEditActionError>`](/docs/schema/bulk-edit-action-error.md) | The mapping dashboard id to errors if any. |


## Get Available Gadgets
<a name="getAllAvailableDashboardGadgets"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-gadgets-get

Gets a list of all available gadgets that can be added to all dashboards

**"Permissions" required:** None.

### Example

```php
/** @var Schema\AvailableDashboardGadgetsResponse $response */
$response = $client->getAllAvailableDashboardGadgets();
```

### Request

#### Response

Source: [`Jira\Client\Schema\AvailableDashboardGadgetsResponse`](/docs/schema/available-dashboard-gadgets-response.md)

The list of available gadgets.

| Property | Type | Description |
| --- | --- | --- |
| `gadgets` | [`list<AvailableDashboardGadget>`](/docs/schema/available-dashboard-gadget.md) | The list of available gadgets. |


## Search For Dashboards
<a name="getDashboardsPaginated"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-search-get

Returns a "paginated" list of dashboards.
This operation is similar to "Get dashboards" except that the results can be refined to include dashboards that have specific attributes.
For example, dashboards with a particular name.
When multiple attributes are specified only filters matching all attributes are returned

This operation can be accessed anonymously

**"Permissions" required:** The following dashboards that match the query parameters are returned:

 - Dashboards owned by the user.
Not returned for anonymous users
 - Dashboards shared with a group that the user is a member of.
Not returned for anonymous users
 - Dashboards shared with a private project that the user can browse.
Not returned for anonymous users
 - Dashboards shared with a public project
 - Dashboards shared with the public.

### Example

```php
/** @var Schema\PageBeanDashboard $response */
$response = $client->getDashboardsPaginated(
    dashboardName: null,
    accountId: null,
    owner: null,
    groupname: null,
    groupId: null,
    projectId: null,
    orderBy: 'name',
    startAt: 0,
    maxResults: 50,
    status: 'active',
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `dashboardName` | `?string` | String used to perform a case-insensitive partial match with `name`. |
| `accountId` | `?string` | User account ID used to return dashboards with the matching `owner.accountId`. This parameter cannot be used with the `owner` parameter. |
| `owner` | `?string` | This parameter is deprecated because of privacy changes. Use `accountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. User name used to return dashboards with the matching `owner.name`. This parameter cannot be used with the `accountId` parameter. |
| `groupname` | `?string` | As a group's name can change, use of `groupId` is recommended. Group name used to return dashboards that are shared with a group that matches `sharePermissions.group.name`. This parameter cannot be used with the `groupId` parameter. |
| `groupId` | `?string` | Group ID used to return dashboards that are shared with a group that matches `sharePermissions.group.groupId`. This parameter cannot be used with the `groupname` parameter. |
| `projectId` | `?int` | Project ID used to returns dashboards that are shared with a project that matches `sharePermissions.project.id`. |
| `orderBy` | `'description'\|`<br/>`'-description'\|`<br/>`'+description'\|`<br/>`'favorite_count'\|`<br/>`'-favorite_count'\|`<br/>`'+favorite_count'\|`<br/>`'id'\|`<br/>`'-id'\|`<br/>`'+id'\|`<br/>`'is_favorite'\|`<br/>`'-is_favorite'\|`<br/>`'+is_favorite'\|`<br/>`'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'owner'\|`<br/>`'-owner'\|`<br/>`'+owner'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `description` Sorts by dashboard description. Note that this sort works independently of whether the expand to display the description field is in use.<br/> *  `favourite_count` Sorts by dashboard popularity.<br/> *  `id` Sorts by dashboard ID.<br/> *  `is_favourite` Sorts by whether the dashboard is marked as a favorite.<br/> *  `name` Sorts by dashboard name.<br/> *  `owner` Sorts by dashboard owner name. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `status` | `'active'\|'archived'\|'deleted'\|null` | The status to filter by. It may be active, archived or deleted. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about dashboard in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `description` Returns the description of the dashboard.<br/> *  `owner` Returns the owner of the dashboard.<br/> *  `viewUrl` Returns the URL that is used to view the dashboard.<br/> *  `favourite` Returns `isFavourite`, an indicator of whether the user has set the dashboard as a favorite.<br/> *  `favouritedCount` Returns `popularity`, a count of how many users have set this dashboard as a favorite.<br/> *  `sharePermissions` Returns details of the share permissions defined for the dashboard.<br/> *  `editPermissions` Returns details of the edit permissions defined for the dashboard.<br/> *  `isWritable` Returns whether the current user has permission to edit the dashboard. |

#### Response

Source: [`Jira\Client\Schema\PageBeanDashboard`](/docs/schema/page-bean-dashboard.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Dashboard>`](/docs/schema/dashboard.md) | The list of items. |


## Get Gadgets
<a name="getAllGadgets"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-dashboard-id-gadget-get

Returns a list of dashboard gadgets on a dashboard

This operation returns:

 - Gadgets from a list of IDs, when `id` is set
 - Gadgets with a module key, when `moduleKey` is set
 - Gadgets from a list of URIs, when `uri` is set
 - All gadgets, when no other parameters are set

This operation can be accessed anonymously

**"Permissions" required:** None.

### Example

```php
/** @var Schema\DashboardGadgetResponse $response */
$response = $client->getAllGadgets(
    dashboardId: 1234,
    moduleKey: null,
    uri: null,
    gadgetId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `dashboardId` | `int` | The ID of the dashboard. |
| `moduleKey` | `?list<string>` | The list of gadgets module keys. To include multiple module keys, separate module keys with ampersand: `moduleKey=key:one&moduleKey=key:two`. |
| `uri` | `?list<string>` | The list of gadgets URIs. To include multiple URIs, separate URIs with ampersand: `uri=/rest/example/uri/1&uri=/rest/example/uri/2`. |
| `gadgetId` | `?list<int>` | The list of gadgets IDs. To include multiple IDs, separate IDs with ampersand: `gadgetId=10000&gadgetId=10001`. |

#### Response

Source: [`Jira\Client\Schema\DashboardGadgetResponse`](/docs/schema/dashboard-gadget-response.md)

The list of gadgets on the dashboard.

| Property | Type | Description |
| --- | --- | --- |
| `gadgets` | [`list<DashboardGadget>`](/docs/schema/dashboard-gadget.md) | The list of gadgets. |


## Add Gadget To Dashboard
<a name="addGadget"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-dashboard-id-gadget-post

Adds a gadget to a dashboard

**"Permissions" required:** None.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\DashboardGadget $response */
$response = $client->addGadget(
    request: new Schema\DashboardGadgetSettings(
        color: 'blue',
        ignoreUriAndModuleKeyValidation: false,
        moduleKey: 'com.atlassian.plugins.atlassian-connect-plugin:com.atlassian.connect.node.sample-addon__sample-dashboard-item',
        position: [
                'column' => '1',
                'row' => '0',
            ],
        title: 'Issue statistics',
    )
    dashboardId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\DashboardGadgetSettings`](/docs/schema/dashboard-gadget-settings.md)

Details of the settings for a dashboard gadget.

| Property | Type | Description |
| --- | --- | --- |
| `color` | `string` | The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`. |
| `ignoreUriAndModuleKeyValidation` | `bool` | Whether to ignore the validation of module key and URI. For example, when a gadget is created that is a part of an application that isn't installed. |
| `moduleKey` | `string` | The module key of the gadget type. Can't be provided with `uri`. |
| `position` | [`DashboardGadgetPosition`](/docs/schema/dashboard-gadget-position.md) | The position of the gadget. When the gadget is placed into the position, other gadgets in the same column are moved down to accommodate it. |
| `title` | `string` | The title of the gadget. |
| `uri` | `string` | The URI of the gadget type. Can't be provided with `moduleKey`. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `dashboardId` | `int` | The ID of the dashboard. |

#### Response

Source: [`Jira\Client\Schema\DashboardGadget`](/docs/schema/dashboard-gadget.md)

Details of a gadget.

| Property | Type | Description |
| --- | --- | --- |
| `color` | `'blue'\|`<br/>`'red'\|`<br/>`'yellow'\|`<br/>`'green'\|`<br/>`'cyan'\|`<br/>`'purple'\|`<br/>`'gray'\|`<br/>`'white'` | The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`. |
| `id` | `int` | The ID of the gadget instance. |
| `position` | [`DashboardGadgetPosition`](/docs/schema/dashboard-gadget-position.md) | The position of the gadget. |
| `title` | `string` | The title of the gadget. |
| `moduleKey` | `string` | The module key of the gadget type. |
| `uri` | `string` | The URI of the gadget type. |


## Update Gadget On Dashboard
<a name="updateGadget"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-dashboard-id-gadget-gadget-id-put

Changes the title, position, and color of the gadget on a dashboard

**"Permissions" required:** None.

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateGadget(
    request: new Schema\DashboardGadgetUpdateRequest(
        color: 'red',
        position: [
                'column' => '1',
                'row' => '1',
            ],
        title: 'My new gadget title',
    )
    dashboardId: 1234,
    gadgetId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\DashboardGadgetUpdateRequest`](/docs/schema/dashboard-gadget-update-request.md)

The details of the gadget to update.

| Property | Type | Description |
| --- | --- | --- |
| `color` | `string` | The color of the gadget. Should be one of `blue`, `red`, `yellow`, `green`, `cyan`, `purple`, `gray`, or `white`. |
| `position` | [`DashboardGadgetPosition`](/docs/schema/dashboard-gadget-position.md) | The position of the gadget. |
| `title` | `string` | The title of the gadget. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `dashboardId` | `int` | The ID of the dashboard. |
| `gadgetId` | `int` | The ID of the gadget. |

#### Response

`true`
## Remove Gadget From Dashboard
<a name="removeGadget"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-dashboard-id-gadget-gadget-id-delete

Removes a dashboard gadget from a dashboard

When a gadget is removed from a dashboard, other gadgets in the same column are moved up to fill the emptied position

**"Permissions" required:** None.

### Example

```php
/** @var true $response */
$response = $client->removeGadget(
    dashboardId: 1234,
    gadgetId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `dashboardId` | `int` | The ID of the dashboard. |
| `gadgetId` | `int` | The ID of the gadget. |

#### Response

`true`
## Get Dashboard Item Property Keys
<a name="getDashboardItemPropertyKeys"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-dashboard-id-items-item-id-properties-get

Returns the keys of all properties for a dashboard item

This operation can be accessed anonymously

**"Permissions" required:** The user must be the owner of the dashboard or have the dashboard shared with them.
Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira\\u2019s anonymous access is permitted.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PropertyKeys $response */
$response = $client->getDashboardItemPropertyKeys(
    dashboardId: 'foo',
    itemId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `dashboardId` | `string` | The ID of the dashboard. |
| `itemId` | `string` | The ID of the dashboard item. |

#### Response

Source: [`Jira\Client\Schema\PropertyKeys`](/docs/schema/property-keys.md)

List of property keys.

| Property | Type | Description |
| --- | --- | --- |
| `keys` | [`?list<PropertyKey>`](/docs/schema/property-key.md) | Property key details. |


## Get Dashboard Item Property
<a name="getDashboardItemProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-dashboard-id-items-item-id-properties-property-key-get

Returns the key and value of a dashboard item property

A dashboard item enables an app to add user-specific information to a user dashboard.
Dashboard items are exposed to users as gadgets that users can add to their dashboards.
For more information on how users do this, see "Adding and customizing gadgets"

When an app creates a dashboard item it registers a callback to receive the dashboard item ID.
The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item.
The app then uses this resource to store the item's content or configuration details.
For more information on working with dashboard items, see " Building a dashboard item for a JIRA Connect add-on" and the "Dashboard Item" documentation

There is no resource to set or get dashboard items

This operation can be accessed anonymously

**"Permissions" required:** The user must be the owner of the dashboard or have the dashboard shared with them.
Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira\\u2019s anonymous access is permitted.
See: https://confluence.atlassian.com/x/7AeiLQ
See: https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/
See: https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\EntityProperty $response */
$response = $client->getDashboardItemProperty(
    dashboardId: 'foo',
    itemId: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `dashboardId` | `string` | The ID of the dashboard. |
| `itemId` | `string` | The ID of the dashboard item. |
| `propertyKey` | `string` | The key of the dashboard item property. |

#### Response

Source: [`Jira\Client\Schema\EntityProperty`](/docs/schema/entity-property.md)

An entity property, for more information see "Entity properties".
See: https://developer.atlassian.com/cloud/jira/platform/jira-entity-properties/

| Property | Type | Description |
| --- | --- | --- |
| `key` | `string` | The key of the property. Required on create and update. |
| `value` | `mixed` | The value of the property. Required on create and update. |


## Set Dashboard Item Property
<a name="setDashboardItemProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-dashboard-id-items-item-id-properties-property-key-put

Sets the value of a dashboard item property.
Use this resource in apps to store custom data against a dashboard item

A dashboard item enables an app to add user-specific information to a user dashboard.
Dashboard items are exposed to users as gadgets that users can add to their dashboards.
For more information on how users do this, see "Adding and customizing gadgets"

When an app creates a dashboard item it registers a callback to receive the dashboard item ID.
The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item.
The app then uses this resource to store the item's content or configuration details.
For more information on working with dashboard items, see " Building a dashboard item for a JIRA Connect add-on" and the "Dashboard Item" documentation

There is no resource to set or get dashboard items

The value of the request body must be a "valid", non-empty JSON blob.
The maximum length is 32768 characters

This operation can be accessed anonymously

**"Permissions" required:** The user must be the owner of the dashboard.
Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
See: https://confluence.atlassian.com/x/7AeiLQ
See: https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/
See: https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/
See: http://tools.ietf.org/html/rfc4627
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `dashboardId` | `string` | The ID of the dashboard. |
| `itemId` | `string` | The ID of the dashboard item. |
| `propertyKey` | `string` | The key of the dashboard item property. The maximum length is 255 characters. For dashboard items with a spec URI and no complete module key, if the provided propertyKey is equal to "config", the request body's JSON must be an object with all keys and values as strings. |

#### Response

`true`
## Delete Dashboard Item Property
<a name="deleteDashboardItemProperty"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-dashboard-id-items-item-id-properties-property-key-delete

Deletes a dashboard item property

This operation can be accessed anonymously

**"Permissions" required:** The user must be the owner of the dashboard.
Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteDashboardItemProperty(
    dashboardId: 'foo',
    itemId: 'foo',
    propertyKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `dashboardId` | `string` | The ID of the dashboard. |
| `itemId` | `string` | The ID of the dashboard item. |
| `propertyKey` | `string` | The key of the dashboard item property. |

#### Response

`true`
## Get Dashboard
<a name="getDashboard"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-id-get

Returns a dashboard

This operation can be accessed anonymously

**"Permissions" required:** None

However, to get a dashboard, the dashboard must be shared with the user or the user must own it.
Note, users with the *Administer Jira* "global permission" are considered owners of the System dashboard.
The System dashboard is considered to be shared with all other users.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\Dashboard $response */
$response = $client->getDashboard(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the dashboard. |

#### Response

Source: [`Jira\Client\Schema\Dashboard`](/docs/schema/dashboard.md)

Details of a dashboard.

| Property | Type | Description |
| --- | --- | --- |
| `automaticRefreshMs` | `int` | The automatic refresh interval for the dashboard in milliseconds. |
| `description` | `string` |  |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The details of any edit share permissions for the dashboard. |
| `id` | `string` | The ID of the dashboard. |
| `isFavourite` | `bool` | Whether the dashboard is selected as a favorite by the user. |
| `isWritable` | `bool` | Whether the current user has permission to edit the dashboard. |
| `name` | `string` | The name of the dashboard. |
| `owner` | [`UserBean`](/docs/schema/user-bean.md) | The owner of the dashboard. |
| `popularity` | `int` | The number of users who have this dashboard as a favorite. |
| `rank` | `int` | The rank of this dashboard. |
| `self` | `string` | The URL of these dashboard details. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The details of any view share permissions for the dashboard. |
| `systemDashboard` | `bool` | Whether the current dashboard is system dashboard. |
| `view` | `string` | The URL of the dashboard. |


## Update Dashboard
<a name="updateDashboard"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-id-put

Updates a dashboard, replacing all the dashboard details with those provided

**"Permissions" required:** None

The dashboard to be updated must be owned by the user.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Dashboard $response */
$response = $client->updateDashboard(
    request: new Schema\DashboardDetails(
        description: 'A dashboard to help auditors identify sample of issues to check.',
        editPermissions: [
            ],
        name: 'Auditors dashboard',
        sharePermissions: [
                [
                    'type' => 'global',
                ],
            ],
    )
    id: 'foo',
    extendAdminPermissions: false,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\DashboardDetails`](/docs/schema/dashboard-details.md)

Details of a dashboard.

| Property | Type | Description |
| --- | --- | --- |
| `editPermissions` | [`list<SharePermission>`](/docs/schema/share-permission.md) | The edit permissions for the dashboard. |
| `name` | `string` | The name of the dashboard. |
| `sharePermissions` | [`list<SharePermission>`](/docs/schema/share-permission.md) | The share permissions for the dashboard. |
| `description` | `string` | The description of the dashboard. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the dashboard to update. |
| `extendAdminPermissions` | `?bool` | Whether admin level permissions are used. It should only be true if the user has *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) |

#### Response

Source: [`Jira\Client\Schema\Dashboard`](/docs/schema/dashboard.md)

Details of a dashboard.

| Property | Type | Description |
| --- | --- | --- |
| `automaticRefreshMs` | `int` | The automatic refresh interval for the dashboard in milliseconds. |
| `description` | `string` |  |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The details of any edit share permissions for the dashboard. |
| `id` | `string` | The ID of the dashboard. |
| `isFavourite` | `bool` | Whether the dashboard is selected as a favorite by the user. |
| `isWritable` | `bool` | Whether the current user has permission to edit the dashboard. |
| `name` | `string` | The name of the dashboard. |
| `owner` | [`UserBean`](/docs/schema/user-bean.md) | The owner of the dashboard. |
| `popularity` | `int` | The number of users who have this dashboard as a favorite. |
| `rank` | `int` | The rank of this dashboard. |
| `self` | `string` | The URL of these dashboard details. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The details of any view share permissions for the dashboard. |
| `systemDashboard` | `bool` | Whether the current dashboard is system dashboard. |
| `view` | `string` | The URL of the dashboard. |


## Delete Dashboard
<a name="deleteDashboard"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-id-delete

Deletes a dashboard

**"Permissions" required:** None

The dashboard to be deleted must be owned by the user.

### Example

```php
/** @var true $response */
$response = $client->deleteDashboard(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the dashboard. |

#### Response

`true`
## Copy Dashboard
<a name="copyDashboard"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-dashboards/#api-rest-api-3-dashboard-id-copy-post

Copies a dashboard.
Any values provided in the `dashboard` parameter replace those in the copied dashboard

**"Permissions" required:** None

The dashboard to be copied must be owned by or shared with the user.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Dashboard $response */
$response = $client->copyDashboard(
    request: new Schema\DashboardDetails(
        description: 'A dashboard to help auditors identify sample of issues to check.',
        editPermissions: [
            ],
        name: 'Auditors dashboard',
        sharePermissions: [
                [
                    'type' => 'global',
                ],
            ],
    )
    id: 'foo',
    extendAdminPermissions: false,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\DashboardDetails`](/docs/schema/dashboard-details.md)

Details of a dashboard.

| Property | Type | Description |
| --- | --- | --- |
| `editPermissions` | [`list<SharePermission>`](/docs/schema/share-permission.md) | The edit permissions for the dashboard. |
| `name` | `string` | The name of the dashboard. |
| `sharePermissions` | [`list<SharePermission>`](/docs/schema/share-permission.md) | The share permissions for the dashboard. |
| `description` | `string` | The description of the dashboard. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` |  |
| `extendAdminPermissions` | `?bool` | Whether admin level permissions are used. It should only be true if the user has *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) |

#### Response

Source: [`Jira\Client\Schema\Dashboard`](/docs/schema/dashboard.md)

Details of a dashboard.

| Property | Type | Description |
| --- | --- | --- |
| `automaticRefreshMs` | `int` | The automatic refresh interval for the dashboard in milliseconds. |
| `description` | `string` |  |
| `editPermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The details of any edit share permissions for the dashboard. |
| `id` | `string` | The ID of the dashboard. |
| `isFavourite` | `bool` | Whether the dashboard is selected as a favorite by the user. |
| `isWritable` | `bool` | Whether the current user has permission to edit the dashboard. |
| `name` | `string` | The name of the dashboard. |
| `owner` | [`UserBean`](/docs/schema/user-bean.md) | The owner of the dashboard. |
| `popularity` | `int` | The number of users who have this dashboard as a favorite. |
| `rank` | `int` | The rank of this dashboard. |
| `self` | `string` | The URL of these dashboard details. |
| `sharePermissions` | [`?list<SharePermission>`](/docs/schema/share-permission.md) | The details of any view share permissions for the dashboard. |
| `systemDashboard` | `bool` | Whether the current dashboard is system dashboard. |
| `view` | `string` | The URL of the dashboard. |
