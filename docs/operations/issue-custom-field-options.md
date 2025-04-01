# Issue Custom Field Options

DummyDescription

Source: [`Jira\Client\Operations\IssueCustomFieldOptions`](/src/Operations/IssueCustomFieldOptions.php)

## Operations

- [Get Custom Field Option](#getCustomFieldOption)
- [Get Custom Field Options (context)](#getOptionsForContext)
- [Update Custom Field Options (context)](#updateCustomFieldOption)
- [Create Custom Field Options (context)](#createCustomFieldOption)
- [Reorder Custom Field Options (context)](#reorderCustomFieldOptions)
- [Delete Custom Field Options (context)](#deleteCustomFieldOption)
- [Replace Custom Field Options](#replaceCustomFieldOption)

## Get Custom Field Option
<a name="getCustomFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options/#api-rest-api-3-custom-field-option-id-get

Returns a custom field option.
For example, an option in a select list

Note that this operation **only works for issue field select list options created in Jira or using operations from the "Issue custom field options" resource**, it cannot be used with issue field select list options created by Connect apps

This operation can be accessed anonymously

**"Permissions" required:** The custom field option is returned as follows:

 - if the user has the *Administer Jira* "global permission"
 - if the user has the *Browse projects* "project permission" for at least one project the custom field is used in, and the field is visible in at least one layout the user has permission to view.
See: https://confluence.atlassian.com/x/x4dKLg
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\CustomFieldOption $response */
$response = $client->getCustomFieldOption(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the custom field option. |

#### Response

Source: [`Jira\Client\Schema\CustomFieldOption`](/docs/schema/custom-field-option.md)

Details of a custom option for a field.

| Property | Type | Description |
| --- | --- | --- |
| `self` | `string` | The URL of these custom field option details. |
| `value` | `string` | The value of the custom field option. |


## Get Custom Field Options (context)
<a name="getOptionsForContext"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options/#api-rest-api-3-field-field-id-context-context-id-option-get

Returns a "paginated" list of all custom field option for a context.
Options are returned first then cascading options, in the order they display in Jira

This operation works for custom field options created in Jira or the operations from this resource.
**To work with issue field select list options created for Connect apps use the "Issue custom field options (apps)" operations.**

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanCustomFieldContextOption $response */
$response = $client->getOptionsForContext(
    fieldId: 'foo',
    contextId: 1234,
    optionId: null,
    onlyOptions: false,
    startAt: 0,
    maxResults: 100,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |
| `optionId` | `?int` | The ID of the option. |
| `onlyOptions` | `?bool` | Whether only options are returned. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanCustomFieldContextOption`](/docs/schema/page-bean-custom-field-context-option.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<CustomFieldContextOption>`](/docs/schema/custom-field-context-option.md) | The list of items. |


## Update Custom Field Options (context)
<a name="updateCustomFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options/#api-rest-api-3-field-field-id-context-context-id-option-put

Updates the options of a custom field

If any of the options are not found, no options are updated.
Options where the values in the request match the current values aren't updated and aren't reported in the response

Note that this operation **only works for issue field select list options created in Jira or using operations from the "Issue custom field options" resource**, it cannot be used with issue field select list options created by Connect apps

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\CustomFieldUpdatedContextOptionsList $response */
$response = $client->updateCustomFieldOption(
    request: new Schema\BulkCustomFieldOptionUpdateRequest(
        options: [
                [
                    'disabled' => '',
                    'id' => '10001',
                    'value' => 'Scranton',
                ],
                [
                    'disabled' => '1',
                    'id' => '10002',
                    'value' => 'Manhattan',
                ],
                [
                    'disabled' => '',
                    'id' => '10003',
                    'value' => 'The Electric City',
                ],
            ],
    )
    fieldId: 'foo',
    contextId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\BulkCustomFieldOptionUpdateRequest`](/docs/schema/bulk-custom-field-option-update-request.md)

Details of the options to update for a custom field.

| Property | Type | Description |
| --- | --- | --- |
| `options` | [`?list<CustomFieldOptionUpdate>`](/docs/schema/custom-field-option-update.md) | Details of the options to update. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |

#### Response

Source: [`Jira\Client\Schema\CustomFieldUpdatedContextOptionsList`](/docs/schema/custom-field-updated-context-options-list.md)

A list of custom field options for a context.

| Property | Type | Description |
| --- | --- | --- |
| `options` | [`?list<CustomFieldOptionUpdate>`](/docs/schema/custom-field-option-update.md) | The updated custom field options. |


## Create Custom Field Options (context)
<a name="createCustomFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options/#api-rest-api-3-field-field-id-context-context-id-option-post

Creates options and, where the custom select field is of the type Select List (cascading), cascading options for a custom select field.
The options are added to a context of the field

The maximum number of options that can be created per request is 1000 and each field can have a maximum of 10000 options

This operation works for custom field options created in Jira or the operations from this resource.
**To work with issue field select list options created for Connect apps use the "Issue custom field options (apps)" operations.**

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\CustomFieldCreatedContextOptionsList $response */
$response = $client->createCustomFieldOption(
    request: new Schema\BulkCustomFieldOptionCreateRequest(
        options: [
                [
                    'disabled' => '',
                    'value' => 'Scranton',
                ],
                [
                    'disabled' => '1',
                    'optionId' => '10000',
                    'value' => 'Manhattan',
                ],
                [
                    'disabled' => '',
                    'value' => 'The Electric City',
                ],
            ],
    )
    fieldId: 'foo',
    contextId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\BulkCustomFieldOptionCreateRequest`](/docs/schema/bulk-custom-field-option-create-request.md)

Details of the options to create for a custom field.

| Property | Type | Description |
| --- | --- | --- |
| `options` | [`?list<CustomFieldOptionCreate>`](/docs/schema/custom-field-option-create.md) | Details of options to create. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |

#### Response

Source: [`Jira\Client\Schema\CustomFieldCreatedContextOptionsList`](/docs/schema/custom-field-created-context-options-list.md)

A list of custom field options for a context.

| Property | Type | Description |
| --- | --- | --- |
| `options` | [`?list<CustomFieldContextOption>`](/docs/schema/custom-field-context-option.md) | The created custom field options. |


## Reorder Custom Field Options (context)
<a name="reorderCustomFieldOptions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options/#api-rest-api-3-field-field-id-context-context-id-option-move-put

Changes the order of custom field options or cascading options in a context

This operation works for custom field options created in Jira or the operations from this resource.
**To work with issue field select list options created for Connect apps use the "Issue custom field options (apps)" operations.**

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->reorderCustomFieldOptions(
    request: new Schema\OrderOfCustomFieldOptions(
        customFieldOptionIds: [
                '10001',
                '10002',
            ],
        position: 'First',
    )
    fieldId: 'foo',
    contextId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\OrderOfCustomFieldOptions`](/docs/schema/order-of-custom-field-options.md)

An ordered list of custom field option IDs and information on where to move them.

| Property | Type | Description |
| --- | --- | --- |
| `customFieldOptionIds` | `list<string>` | A list of IDs of custom field options to move. The order of the custom field option IDs in the list is the order they are given after the move. The list must contain custom field options or cascading options, but not both. |
| `after` | `string` | The ID of the custom field option or cascading option to place the moved options after. Required if `position` isn't provided. |
| `position` | `'First'\|'Last'\|null` | The position the custom field options should be moved to. Required if `after` isn't provided. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |

#### Response

`true`
## Delete Custom Field Options (context)
<a name="deleteCustomFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options/#api-rest-api-3-field-field-id-context-context-id-option-option-id-delete

Deletes a custom field option

Options with cascading options cannot be deleted without deleting the cascading options first

This operation works for custom field options created in Jira or the operations from this resource.
**To work with issue field select list options created for Connect apps use the "Issue custom field options (apps)" operations.**

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteCustomFieldOption(
    fieldId: 'foo',
    contextId: 1234,
    optionId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context from which an option should be deleted. |
| `optionId` | `int` | The ID of the option to delete. |

#### Response

`true`
## Replace Custom Field Options
<a name="replaceCustomFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options/#api-rest-api-3-field-field-id-context-context-id-option-option-id-issue-delete

Replaces the options of a custom field

Note that this operation **only works for issue field select list options created in Jira or using operations from the "Issue custom field options" resource**, it cannot be used with issue field select list options created by Connect or Forge apps

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\TaskProgressBeanRemoveOptionFromIssuesResult $response */
$response = $client->replaceCustomFieldOption(
    fieldId: 'foo',
    optionId: 1234,
    contextId: 1234,
    replaceWith: null,
    jql: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `optionId` | `int` | The ID of the option to be deselected. |
| `contextId` | `int` | The ID of the context. |
| `replaceWith` | `?int` | The ID of the option that will replace the currently selected option. |
| `jql` | `?string` | A JQL query that specifies the issues to be updated. For example, *project=10000*. |

#### Response

Source: [`Jira\Client\Schema\TaskProgressBeanRemoveOptionFromIssuesResult`](/docs/schema/task-progress-bean-remove-option-from-issues-result.md)

Details about a task.

| Property | Type | Description |
| --- | --- | --- |
| `elapsedRuntime` | `int` | The execution time of the task, in milliseconds. |
| `id` | `string` | The ID of the task. |
| `lastUpdate` | `int` | A timestamp recording when the task progress was last updated. |
| `progress` | `int` | The progress of the task, as a percentage complete. |
| `self` | `string` | The URL of the task. |
| `status` | `'ENQUEUED'\|`<br/>`'RUNNING'\|`<br/>`'COMPLETE'\|`<br/>`'FAILED'\|`<br/>`'CANCEL_REQUESTED'\|`<br/>`'CANCELLED'\|`<br/>`'DEAD'` | The status of the task. |
| `submitted` | `int` | A timestamp recording when the task was submitted. |
| `submittedBy` | `int` | The ID of the user who submitted the task. |
| `description` | `string` | The description of the task. |
| `finished` | `int` | A timestamp recording when the task was finished. |
| `message` | `string` | Information about the progress of the task. |
| `result` | [`RemoveOptionFromIssuesResult`](/docs/schema/remove-option-from-issues-result.md) | The result of the task execution. |
| `started` | `int` | A timestamp recording when the task was started. |
