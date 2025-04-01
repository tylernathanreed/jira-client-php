# Screen Schemes

DummyDescription

Source: [`Jira\Client\Operations\ScreenSchemes`](/src/Operations/ScreenSchemes.php)

## Operations

- [Get Screen Schemes](#getScreenSchemes)
- [Create Screen Scheme](#createScreenScheme)
- [Update Screen Scheme](#updateScreenScheme)
- [Delete Screen Scheme](#deleteScreenScheme)

## Get Screen Schemes
<a name="getScreenSchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-schemes/#api-rest-api-3-screenscheme-get

Returns a "paginated" list of screen schemes

Only screen schemes used in classic projects are returned

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanScreenScheme $response */
$response = $client->getScreenSchemes(
    startAt: 0,
    maxResults: 25,
    id: null,
    expand: '',
    queryString: '',
    orderBy: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `id` | `?list<int>` | The list of screen scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. |
| `expand` | `?string` | Use [expand](#expansion) include additional information in the response. This parameter accepts `issueTypeScreenSchemes` that, for each screen schemes, returns information about the issue type screen scheme the screen scheme is assigned to. |
| `queryString` | `?string` | String used to perform a case-insensitive partial match with screen scheme name. |
| `orderBy` | `'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'id'\|`<br/>`'-id'\|`<br/>`'+id'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `id` Sorts by screen scheme ID.<br/> *  `name` Sorts by screen scheme name. |

#### Response

Source: [`Jira\Client\Schema\PageBeanScreenScheme`](/docs/schema/page-bean-screen-scheme.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ScreenScheme>`](/docs/schema/screen-scheme.md) | The list of items. |


## Create Screen Scheme
<a name="createScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-schemes/#api-rest-api-3-screenscheme-post

Creates a screen scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ScreenSchemeId $response */
$response = $client->createScreenScheme(new Schema\ScreenSchemeDetails(
    description: 'Manage employee data',
    name: 'Employee screen scheme',
    screens: [
                'default' => '10017',
                'edit' => '10019',
                'view' => '10020',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ScreenSchemeDetails`](/docs/schema/screen-scheme-details.md)

Details of a screen scheme.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the screen scheme. The name must be unique. The maximum length is 255 characters. |
| `screens` | [`ScreenTypes`](/docs/schema/screen-types.md) | The IDs of the screens for the screen types of the screen scheme. Only screens used in classic projects are accepted. |
| `description` | `string` | The description of the screen scheme. The maximum length is 255 characters. |

#### Response

Source: [`Jira\Client\Schema\ScreenSchemeId`](/docs/schema/screen-scheme-id.md)

The ID of a screen scheme.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the screen scheme. |


## Update Screen Scheme
<a name="updateScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-schemes/#api-rest-api-3-screenscheme-screen-scheme-id-put

Updates a screen scheme.
Only screen schemes used in classic projects can be updated

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateScreenScheme(
    request: new Schema\UpdateScreenSchemeDetails(
        name: 'Employee screen scheme v2',
        screens: [
                'create' => '10019',
                'default' => '10018',
            ],
    )
    screenSchemeId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateScreenSchemeDetails`](/docs/schema/update-screen-scheme-details.md)

Details of a screen scheme.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the screen scheme. The maximum length is 255 characters. |
| `name` | `string` | The name of the screen scheme. The name must be unique. The maximum length is 255 characters. |
| `screens` | [`UpdateScreenTypes`](/docs/schema/update-screen-types.md) | The IDs of the screens for the screen types of the screen scheme. Only screens used in classic projects are accepted. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenSchemeId` | `string` | The ID of the screen scheme. |

#### Response

`true`
## Delete Screen Scheme
<a name="deleteScreenScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-schemes/#api-rest-api-3-screenscheme-screen-scheme-id-delete

Deletes a screen scheme.
A screen scheme cannot be deleted if it is used in an issue type screen scheme

Only screens schemes used in classic projects can be deleted

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteScreenScheme(
    screenSchemeId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenSchemeId` | `string` | The ID of the screen scheme. |

#### Response

`true`
