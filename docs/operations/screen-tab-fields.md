# Screen Tab Fields

Source: [`Jira\Client\Operations\ScreenTabFields`](/src/Operations/ScreenTabFields.php)

## Operations

- [Get All Screen Tab Fields](#getAllScreenTabFields)
- [Add Screen Tab Field](#addScreenTabField)
- [Remove Screen Tab Field](#removeScreenTabField)
- [Move Screen Tab Field](#moveScreenTabField)

## Get All Screen Tab Fields
<a name="getAllScreenTabFields"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/#api-rest-api-3-screens-screen-id-tabs-tab-id-fields-get

Returns all fields for a screen tab

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
| `tabId` | `int` | The ID of the screen tab. |
| `projectKey` | `?string` | The key of the project. |

#### Response


## Add Screen Tab Field
<a name="addScreenTabField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/#api-rest-api-3-screens-screen-id-tabs-tab-id-fields-post

Adds a field to a screen tab

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ScreenableField $response */
$response = $client->addScreenTabField(
    request: new Schema\AddFieldBean(
        fieldId: 'summary',
    )
    screenId: 1234,
    tabId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\AddFieldBean`](/docs/schema/add-field-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the field to add. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |
| `tabId` | `int` | The ID of the screen tab. |

#### Response

Source: [`Jira\Client\Schema\ScreenableField`](/docs/schema/screenable-field.md)

A screen tab field.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the screen tab field. |
| `name` | `string` | The name of the screen tab field. Required on create and update. The maximum length is 255 characters. |


## Remove Screen Tab Field
<a name="removeScreenTabField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/#api-rest-api-3-screens-screen-id-tabs-tab-id-fields-id-delete

Removes a field from a screen tab

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->removeScreenTabField(
    screenId: 1234,
    tabId: 1234,
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |
| `tabId` | `int` | The ID of the screen tab. |
| `id` | `string` | The ID of the field. |

#### Response

`true`
## Move Screen Tab Field
<a name="moveScreenTabField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-screen-tab-fields/#api-rest-api-3-screens-screen-id-tabs-tab-id-fields-id-move-post

Moves a screen tab field

If `after` and `position` are provided in the request, `position` is ignored

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\MoveFieldBean`](/docs/schema/move-field-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `after` | `string` | The ID of the screen tab field after which to place the moved screen tab field. Required if `position` isn't provided. |
| `position` | `'Earlier'\|`<br/>`'Later'\|`<br/>`'First'\|`<br/>`'Last'\|`<br/>`null` | The named position to which the screen tab field should be moved. Required if `after` isn't provided. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `screenId` | `int` | The ID of the screen. |
| `tabId` | `int` | The ID of the screen tab. |
| `id` | `string` | The ID of the field. |

#### Response

`true`
