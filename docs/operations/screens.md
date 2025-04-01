# Screens

Source: [`Jira\Client\Operations\Screens`](/src/Operations/Screens.php)

## Operations

- [Get Screens For A Field](#getScreensForField)
- [Get Screens](#getScreens)
- [Create Screen](#createScreen)
- [Add Field To Default Screen](#addFieldToDefaultScreen)
- [Update Screen](#updateScreen)
- [Delete Screen](#deleteScreen)
- [Get Available Screen Fields](#getAvailableScreenFields)

## Get Screens For A Field
<a name="getScreensForField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/#api-rest-api-3-field-field-id-screens-get

Returns a "paginated" list of the screens a field is used in

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanScreenWithTab $response */
$response = $client->getScreensForField(
    fieldId: 'foo',
    startAt: 0,
    maxResults: 100,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the field to return screens for. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `expand` | `?string` | Use [expand](#expansion) to include additional information about screens in the response. This parameter accepts `tab` which returns details about the screen tabs the field is used in. |

#### Response

Source: [`Jira\Client\Schema\PageBeanScreenWithTab`](/docs/schema/page-bean-screen-with-tab.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ScreenWithTab>`](/docs/schema/screen-with-tab.md) | The list of items. |


## Get Screens
<a name="getScreens"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/#api-rest-api-3-screens-get

Returns a "paginated" list of all screens or those specified by one or more screen IDs

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanScreen $response */
$response = $client->getScreens(
    startAt: 0,
    maxResults: 100,
    id: null,
    queryString: '',
    scope: null,
    orderBy: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `id` | `?list<int>` | The list of screen IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. |
| `queryString` | `?string` | String used to perform a case-insensitive partial match with screen name. |
| `scope` | `?list<'GLOBAL'\|'TEMPLATE'\|'PROJECT'>` | The scope filter string. To filter by multiple scope, provide an ampersand-separated list. For example, `scope=GLOBAL&scope=PROJECT`. |
| `orderBy` | `'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'id'\|`<br/>`'-id'\|`<br/>`'+id'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `id` Sorts by screen ID.<br/> *  `name` Sorts by screen name. |

#### Response

Source: [`Jira\Client\Schema\PageBeanScreen`](/docs/schema/page-bean-screen.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Screen>`](/docs/schema/screen.md) | The list of items. |


## Create Screen
<a name="createScreen"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/#api-rest-api-3-screens-post

Creates a screen with a default field tab

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Screen $response */
$response = $client->createScreen(new Schema\ScreenDetails(
    description: 'Enables changes to resolution and linked issues.',
    name: 'Resolve Security Issue Screen',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ScreenDetails`](/docs/schema/screen-details.md)

Details of a screen.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the screen. The name must be unique. The maximum length is 255 characters. |
| `description` | `string` | The description of the screen. The maximum length is 255 characters. |

#### Response

Source: [`Jira\Client\Schema\Screen`](/docs/schema/screen.md)

A screen.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the screen. |
| `id` | `int` | The ID of the screen. |
| `name` | `string` | The name of the screen. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the screen. |


## Add Field To Default Screen
<a name="addFieldToDefaultScreen"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/#api-rest-api-3-screens-add-to-default-field-id-post

Adds a field to the default tab of the default screen

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the field. |

#### Response

`true`
## Update Screen
<a name="updateScreen"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/#api-rest-api-3-screens-screen-id-put

Updates a screen.
Only screens used in classic projects can be updated

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\Screen $response */
$response = $client->updateScreen(
    request: new Schema\UpdateScreenDetails(
        description: 'Enables changes to resolution and linked issues for accessibility related issues.',
        name: 'Resolve Accessibility Issue Screen',
    )
    screenId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateScreenDetails`](/docs/schema/update-screen-details.md)

Details of a screen.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the screen. The maximum length is 255 characters. |
| `name` | `string` | The name of the screen. The name must be unique. The maximum length is 255 characters. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |

#### Response

Source: [`Jira\Client\Schema\Screen`](/docs/schema/screen.md)

A screen.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the screen. |
| `id` | `int` | The ID of the screen. |
| `name` | `string` | The name of the screen. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the screen. |


## Delete Screen
<a name="deleteScreen"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/#api-rest-api-3-screens-screen-id-delete

Deletes a screen.
A screen cannot be deleted if it is used in a screen scheme, workflow, or workflow draft

Only screens used in classic projects can be deleted.

### Example

```php
/** @var true $response */
$response = $client->deleteScreen(
    screenId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |

#### Response

`true`
## Get Available Screen Fields
<a name="getAvailableScreenFields"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screens/#api-rest-api-3-screens-screen-id-available-fields-get

Returns the fields that can be added to a tab on a screen

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |

#### Response
