# Screen Tabs

Source: [`Jira\Client\Operations\ScreenTabs`](/src/Operations/ScreenTabs.php)

## Operations

- [Get Bulk Screen Tabs](#getBulkScreenTabs)
- [Get All Screen Tabs](#getAllScreenTabs)
- [Create Screen Tab](#addScreenTab)
- [Update Screen Tab](#renameScreenTab)
- [Delete Screen Tab](#deleteScreenTab)
- [Move Screen Tab](#moveScreenTab)

## Get Bulk Screen Tabs
<a name="getBulkScreenTabs"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tabs/#api-rest-api-3-screens-tabs-get

Returns the list of tabs for a bulk of screens

**"Permissions" required:**

 - *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->getBulkScreenTabs(
    screenId: null,
    tabId: null,
    startAt: 0,
    maxResult: 100,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `?list<int>` | The list of screen IDs. To include multiple screen IDs, provide an ampersand-separated list. For example, `screenId=10000&screenId=10001`. |
| `tabId` | `?list<int>` | The list of tab IDs. To include multiple tab IDs, provide an ampersand-separated list. For example, `tabId=10000&tabId=10001`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResult` | `?int` | The maximum number of items to return per page. The maximum number is 100, |

#### Response

`true`
## Get All Screen Tabs
<a name="getAllScreenTabs"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tabs/#api-rest-api-3-screens-screen-id-tabs-get

Returns the list of tabs for a screen

**"Permissions" required:**

 - *Administer Jira* "global permission"
 - *Administer projects* "project permission" when the project key is specified, providing that the screen is associated with the project through a Screen Scheme and Issue Type Screen Scheme.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |
| `projectKey` | `?string` | The key of the project. |

#### Response


## Create Screen Tab
<a name="addScreenTab"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tabs/#api-rest-api-3-screens-screen-id-tabs-post

Creates a tab for a screen

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ScreenableTab $response */
$response = $client->addScreenTab(
    request: new Schema\ScreenableTab(
        name: 'Fields Tab',
    )
    screenId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ScreenableTab`](/docs/schema/screenable-tab.md)

A screen tab.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the screen tab. The maximum length is 255 characters. |
| `id` | `int` | The ID of the screen tab. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |

#### Response

Source: [`Jira\Client\Schema\ScreenableTab`](/docs/schema/screenable-tab.md)

A screen tab.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the screen tab. The maximum length is 255 characters. |
| `id` | `int` | The ID of the screen tab. |


## Update Screen Tab
<a name="renameScreenTab"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tabs/#api-rest-api-3-screens-screen-id-tabs-tab-id-put

Updates the name of a screen tab

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\ScreenableTab`](/docs/schema/screenable-tab.md)

A screen tab.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the screen tab. The maximum length is 255 characters. |
| `id` | `int` | The ID of the screen tab. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |
| `tabId` | `int` | The ID of the screen tab. |

#### Response

Source: [`Jira\Client\Schema\ScreenableTab`](/docs/schema/screenable-tab.md)

A screen tab.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the screen tab. The maximum length is 255 characters. |
| `id` | `int` | The ID of the screen tab. |


## Delete Screen Tab
<a name="deleteScreenTab"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tabs/#api-rest-api-3-screens-screen-id-tabs-tab-id-delete

Deletes a screen tab

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteScreenTab(
    screenId: 1234,
    tabId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |
| `tabId` | `int` | The ID of the screen tab. |

#### Response

`true`
## Move Screen Tab
<a name="moveScreenTab"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tabs/#api-rest-api-3-screens-screen-id-tabs-tab-id-move-pos-post

Moves a screen tab

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->moveScreenTab(
    screenId: 1234,
    tabId: 1234,
    pos: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |
| `tabId` | `int` | The ID of the screen tab. |
| `pos` | `int` | The position of tab. The base index is 0. |

#### Response

`true`
