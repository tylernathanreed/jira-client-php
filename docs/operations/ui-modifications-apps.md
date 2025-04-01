# UI Modifications Apps

DummyDescription

Source: [`Jira\Client\Operations\UIModificationsApps`](/src/Operations/UIModificationsApps.php)

## Operations

- [Get UI Modifications](#getUiModifications)
- [Create UI Modification](#createUiModification)
- [Update UI Modification](#updateUiModification)
- [Delete UI Modification](#deleteUiModification)

## Get UI Modifications
<a name="getUiModifications"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-ui-modifications-apps/#api-rest-api-3-ui-modifications-get

Gets UI modifications.
UI modifications can only be retrieved by Forge apps

**"Permissions" required:** None

The new `read:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.

### Example

```php
/** @var Schema\PageBeanUiModificationDetails $response */
$response = $client->getUiModifications(
    startAt: 0,
    maxResults: 50,
    expand: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `expand` | `?string` | Use expand to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `data` Returns UI modification data.<br/> *  `contexts` Returns UI modification contexts. |

#### Response

Source: [`Jira\Client\Schema\PageBeanUiModificationDetails`](/docs/schema/page-bean-ui-modification-details.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<UiModificationDetails>`](/docs/schema/ui-modification-details.md) | The list of items. |


## Create UI Modification
<a name="createUiModification"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-ui-modifications-apps/#api-rest-api-3-ui-modifications-post

Creates a UI modification.
UI modification can only be created by Forge apps

Each app can define up to 3000 UI modifications.
Each UI modification can define up to 1000 contexts.
The same context can be assigned to maximum 100 UI modifications

**"Permissions" required:**

 - *None* if the UI modification is created without contexts
 - *Browse projects* "project permission" for one or more projects, if the UI modification is created with contexts

The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\UiModificationIdentifiers $response */
$response = $client->createUiModification(new Schema\CreateUiModificationDetails(
    contexts: [
                [
                    'issueTypeId' => '10000',
                    'projectId' => '10000',
                    'viewType' => 'GIC',
                ],
                [
                    'issueTypeId' => '10001',
                    'projectId' => '10000',
                    'viewType' => 'IssueView',
                ],
                [
                    'issueTypeId' => '10002',
                    'projectId' => '10000',
                    'viewType' => 'IssueTransition',
                ],
                [
                    'issueTypeId' => '10003',
                    'projectId' => '10000',
                    'viewType' => '',
                ],
            ],
    data: '{field: \'Story Points\', config: {hidden: false}}',
    description: 'Reveals Story Points field when any Sprint is selected.',
    name: 'Reveal Story Points',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateUiModificationDetails`](/docs/schema/create-ui-modification-details.md)

The details of a UI modification.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the UI modification. The maximum length is 255 characters. |
| `contexts` | [`?list<UiModificationContextDetails>`](/docs/schema/ui-modification-context-details.md) | List of contexts of the UI modification. The maximum number of contexts is 1000. |
| `data` | `string` | The data of the UI modification. The maximum size of the data is 50000 characters. |
| `description` | `string` | The description of the UI modification. The maximum length is 255 characters. |

#### Response

Source: [`Jira\Client\Schema\UiModificationIdentifiers`](/docs/schema/ui-modification-identifiers.md)

Identifiers for a UI modification.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the UI modification. |
| `self` | `string` | The URL of the UI modification. |


## Update UI Modification
<a name="updateUiModification"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-ui-modifications-apps/#api-rest-api-3-ui-modifications-ui-modification-id-put

Updates a UI modification.
UI modification can only be updated by Forge apps

Each UI modification can define up to 1000 contexts.
The same context can be assigned to maximum 100 UI modifications

**"Permissions" required:**

 - *None* if the UI modification is created without contexts
 - *Browse projects* "project permission" for one or more projects, if the UI modification is created with contexts

The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateUiModification(
    request: new Schema\UpdateUiModificationDetails(
        contexts: [
                [
                    'issueTypeId' => '10000',
                    'projectId' => '10000',
                    'viewType' => 'GIC',
                ],
                [
                    'issueTypeId' => '10001',
                    'projectId' => '10000',
                    'viewType' => 'IssueView',
                ],
                [
                    'issueTypeId' => '10002',
                    'projectId' => '10000',
                    'viewType' => 'IssueTransition',
                ],
            ],
        data: '{field: \'Story Points\', config: {hidden: true}}',
        name: 'Updated Reveal Story Points',
    )
    uiModificationId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateUiModificationDetails`](/docs/schema/update-ui-modification-details.md)

The details of a UI modification.

| Property | Type | Description |
| --- | --- | --- |
| `contexts` | [`?list<UiModificationContextDetails>`](/docs/schema/ui-modification-context-details.md) | List of contexts of the UI modification. The maximum number of contexts is 1000. If provided, replaces all existing contexts. |
| `data` | `string` | The data of the UI modification. The maximum size of the data is 50000 characters. |
| `description` | `string` | The description of the UI modification. The maximum length is 255 characters. |
| `name` | `string` | The name of the UI modification. The maximum length is 255 characters. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `uiModificationId` | `string` | The ID of the UI modification. |

#### Response

`true`
## Delete UI Modification
<a name="deleteUiModification"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-ui-modifications-apps/#api-rest-api-3-ui-modifications-ui-modification-id-delete

Deletes a UI modification.
All the contexts that belong to the UI modification are deleted too.
UI modification can only be deleted by Forge apps

**"Permissions" required:** None

The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.

### Example

```php
/** @var true $response */
$response = $client->deleteUiModification(
    uiModificationId: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `uiModificationId` | `string` | The ID of the UI modification. |

#### Response

`true`
