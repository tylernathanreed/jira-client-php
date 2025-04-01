# Issue Custom Field Configuration Apps

DummyDescription

Source: [`Jira\Client\Operations\IssueCustomFieldConfigurationApps`](/src/Operations/IssueCustomFieldConfigurationApps.php)

## Operations

- [Bulk Get Custom Field Configurations](#getCustomFieldsConfigurations)
- [Get Custom Field Configurations](#getCustomFieldConfiguration)
- [Update Custom Field Configurations](#updateCustomFieldConfiguration)

## Bulk Get Custom Field Configurations
<a name="getCustomFieldsConfigurations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-configuration-apps/#api-rest-api-3-app-field-context-configuration-list-post

Returns a "paginated" list of configurations for list of custom fields of a "type" created by a "Forge app"

The result can be filtered by one of these criteria:

 - `id`
 - `fieldContextId`
 - `issueId`
 - `projectKeyOrId` and `issueTypeId`

Otherwise, all configurations for the provided list of custom fields are returned

**"Permissions" required:** *Administer Jira* "global permission".
Jira permissions are not required for the Forge app that provided the custom field type.
See: https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/
See: https://developer.atlassian.com/platform/forge/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PageBeanBulkContextualConfiguration $response */
$response = $client->getCustomFieldsConfigurations(
    request: new Schema\ConfigurationsListParameters(
        fieldIdsOrKeys: [
                'customfield_10035',
                'customfield_10036',
            ],
    )
    id: null,
    fieldContextId: null,
    issueId: null,
    projectKeyOrId: null,
    issueTypeId: null,
    startAt: 0,
    maxResults: 100,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ConfigurationsListParameters`](/docs/schema/configurations-list-parameters.md)

List of custom fields identifiers which will be used to filter configurations

| Property | Type | Description |
| --- | --- | --- |
| `fieldIdsOrKeys` | `list<string>` | List of IDs or keys of the custom fields. It can be a mix of IDs and keys in the same query. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `?list<int>` | The list of configuration IDs. To include multiple configurations, separate IDs with an ampersand: `id=10000&id=10001`. Can't be provided with `fieldContextId`, `issueId`, `projectKeyOrId`, or `issueTypeId`. |
| `fieldContextId` | `?list<int>` | The list of field context IDs. To include multiple field contexts, separate IDs with an ampersand: `fieldContextId=10000&fieldContextId=10001`. Can't be provided with `id`, `issueId`, `projectKeyOrId`, or `issueTypeId`. |
| `issueId` | `?int` | The ID of the issue to filter results by. If the issue doesn't exist, an empty list is returned. Can't be provided with `projectKeyOrId`, or `issueTypeId`. |
| `projectKeyOrId` | `?string` | The ID or key of the project to filter results by. Must be provided with `issueTypeId`. Can't be provided with `issueId`. |
| `issueTypeId` | `?string` | The ID of the issue type to filter results by. Must be provided with `projectKeyOrId`. Can't be provided with `issueId`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanBulkContextualConfiguration`](/docs/schema/page-bean-bulk-contextual-configuration.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<BulkContextualConfiguration>`](/docs/schema/bulk-contextual-configuration.md) | The list of items. |


## Get Custom Field Configurations
<a name="getCustomFieldConfiguration"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-configuration-apps/#api-rest-api-3-app-field-field-id-or-key-context-configuration-get

Returns a "paginated" list of configurations for a custom field of a "type" created by a "Forge app"

The result can be filtered by one of these criteria:

 - `id`
 - `fieldContextId`
 - `issueId`
 - `projectKeyOrId` and `issueTypeId`

Otherwise, all configurations are returned

**"Permissions" required:** *Administer Jira* "global permission".
Jira permissions are not required for the Forge app that provided the custom field type.
See: https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/
See: https://developer.atlassian.com/platform/forge/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanContextualConfiguration $response */
$response = $client->getCustomFieldConfiguration(
    fieldIdOrKey: 'foo',
    id: null,
    fieldContextId: null,
    issueId: null,
    projectKeyOrId: null,
    issueTypeId: null,
    startAt: 0,
    maxResults: 100,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldIdOrKey` | `string` | The ID or key of the custom field, for example `customfield_10000`. |
| `id` | `?list<int>` | The list of configuration IDs. To include multiple configurations, separate IDs with an ampersand: `id=10000&id=10001`. Can't be provided with `fieldContextId`, `issueId`, `projectKeyOrId`, or `issueTypeId`. |
| `fieldContextId` | `?list<int>` | The list of field context IDs. To include multiple field contexts, separate IDs with an ampersand: `fieldContextId=10000&fieldContextId=10001`. Can't be provided with `id`, `issueId`, `projectKeyOrId`, or `issueTypeId`. |
| `issueId` | `?int` | The ID of the issue to filter results by. If the issue doesn't exist, an empty list is returned. Can't be provided with `projectKeyOrId`, or `issueTypeId`. |
| `projectKeyOrId` | `?string` | The ID or key of the project to filter results by. Must be provided with `issueTypeId`. Can't be provided with `issueId`. |
| `issueTypeId` | `?string` | The ID of the issue type to filter results by. Must be provided with `projectKeyOrId`. Can't be provided with `issueId`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanContextualConfiguration`](/docs/schema/page-bean-contextual-configuration.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ContextualConfiguration>`](/docs/schema/contextual-configuration.md) | The list of items. |


## Update Custom Field Configurations
<a name="updateCustomFieldConfiguration"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-configuration-apps/#api-rest-api-3-app-field-field-id-or-key-context-configuration-put

Update the configuration for contexts of a custom field of a "type" created by a "Forge app"

**"Permissions" required:** *Administer Jira* "global permission".
Jira permissions are not required for the Forge app that created the custom field type.
See: https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/
See: https://developer.atlassian.com/platform/forge/
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Request Body

Source: [`Jira\Client\Schema\CustomFieldConfigurations`](/docs/schema/custom-field-configurations.md)

Details of configurations for a custom field.

| Property | Type | Description |
| --- | --- | --- |
| `configurations` | [`list<ContextualConfiguration>`](/docs/schema/contextual-configuration.md) | The list of custom field configuration details. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldIdOrKey` | `string` | The ID or key of the custom field, for example `customfield_10000`. |

#### Response

`true`
