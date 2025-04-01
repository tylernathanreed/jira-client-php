# Issue Custom Field Options Apps

DummyDescription

Source: [`Jira\Client\Operations\IssueCustomFieldOptionsApps`](/src/Operations/IssueCustomFieldOptionsApps.php)

## Operations

- [Get All Issue Field Options](#getAllIssueFieldOptions)
- [Create Issue Field Option](#createIssueFieldOption)
- [Get Selectable Issue Field Options](#getSelectableIssueFieldOptions)
- [Get Visible Issue Field Options](#getVisibleIssueFieldOptions)
- [Get Issue Field Option](#getIssueFieldOption)
- [Update Issue Field Option](#updateIssueFieldOption)
- [Delete Issue Field Option](#deleteIssueFieldOption)
- [Replace Issue Field Option](#replaceIssueFieldOption)

## Get All Issue Field Options
<a name="getAllIssueFieldOptions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options-apps/#api-rest-api-3-field-field-key-option-get

Returns a "paginated" list of all the options of a select list issue field.
A select list issue field is a type of "issue field" that enables a user to select a value from a list of options

Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource

**"Permissions" required:** *Administer Jira* "global permission".
Jira permissions are not required for the app providing the field.
See: https://developer.atlassian.com/cloud/jira/platform/modules/issue-field/
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueFieldOption $response */
$response = $client->getAllIssueFieldOptions(
    fieldKey: 'foo',
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldKey` | `string` | The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:<br/><br/> *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.<br/> *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"` |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueFieldOption`](/docs/schema/page-bean-issue-field-option.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueFieldOption>`](/docs/schema/issue-field-option.md) | The list of items. |


## Create Issue Field Option
<a name="createIssueFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options-apps/#api-rest-api-3-field-field-key-option-post

Creates an option for a select list issue field

Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource

Each field can have a maximum of 10000 options, and each option can have a maximum of 10000 scopes

**"Permissions" required:** *Administer Jira* "global permission".
Jira permissions are not required for the app providing the field.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IssueFieldOption $response */
$response = $client->createIssueFieldOption(
    request: new Schema\IssueFieldOptionCreateBean(
        config: [
                'attributes' => [
                ],
                'scope' => [
                    'global' => [
                    ],
                    'projects' => [
                    ],
                    'projects2' => [
                        0 => [
                            'attributes' => [
                                0 => 'notSelectable',
                            ],
                            'id' => '1001',
                        ],
                        1 => [
                            'attributes' => [
                                0 => 'notSelectable',
                            ],
                            'id' => '1002',
                        ],
                    ],
                ],
            ],
        properties: [
                'description' => 'The team\\\'s description',
                'founded' => '2016-06-06',
                'leader' => [
                    'email' => 'lname@example.com',
                    'name' => 'Leader Name',
                ],
                'members' => '42',
            ],
        value: 'Team 1',
    )
    fieldKey: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueFieldOptionCreateBean`](/docs/schema/issue-field-option-create-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `value` | `string` | The option's name, which is displayed in Jira. |
| `config` | [`IssueFieldOptionConfiguration`](/docs/schema/issue-field-option-configuration.md) |  |
| `properties` | `array<string,mixed>` | The properties of the option as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/) are defined in the descriptor for the issue field module. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldKey` | `string` | The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:<br/><br/> *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.<br/> *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"` |

#### Response

Source: [`Jira\Client\Schema\IssueFieldOption`](/docs/schema/issue-field-option.md)

Details of the options for a select list issue field.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The unique identifier for the option. This is only unique within the select field's set of options. |
| `value` | `string` | The option's name, which is displayed in Jira. |
| `config` | [`IssueFieldOptionConfiguration`](/docs/schema/issue-field-option-configuration.md) |  |
| `properties` | `array<string,mixed>` | The properties of the object, as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see [Issue Field Option Property Index](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/)) are defined in the descriptor for the issue field module. |


## Get Selectable Issue Field Options
<a name="getSelectableIssueFieldOptions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options-apps/#api-rest-api-3-field-field-key-option-suggestions-edit-get

Returns a "paginated" list of options for a select list issue field that can be viewed and selected by the user

Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanIssueFieldOption $response */
$response = $client->getSelectableIssueFieldOptions(
    fieldKey: 'foo',
    startAt: 0,
    maxResults: 50,
    projectId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldKey` | `string` | The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:<br/><br/> *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.<br/> *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"` |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `projectId` | `?int` | Filters the results to options that are only available in the specified project. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueFieldOption`](/docs/schema/page-bean-issue-field-option.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueFieldOption>`](/docs/schema/issue-field-option.md) | The list of items. |


## Get Visible Issue Field Options
<a name="getVisibleIssueFieldOptions"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options-apps/#api-rest-api-3-field-field-key-option-suggestions-search-get

Returns a "paginated" list of options for a select list issue field that can be viewed by the user

Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\PageBeanIssueFieldOption $response */
$response = $client->getVisibleIssueFieldOptions(
    fieldKey: 'foo',
    startAt: 0,
    maxResults: 50,
    projectId: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldKey` | `string` | The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:<br/><br/> *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.<br/> *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"` |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `projectId` | `?int` | Filters the results to options that are only available in the specified project. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueFieldOption`](/docs/schema/page-bean-issue-field-option.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueFieldOption>`](/docs/schema/issue-field-option.md) | The list of items. |


## Get Issue Field Option
<a name="getIssueFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options-apps/#api-rest-api-3-field-field-key-option-option-id-get

Returns an option from a select list issue field

Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource

**"Permissions" required:** *Administer Jira* "global permission".
Jira permissions are not required for the app providing the field.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\IssueFieldOption $response */
$response = $client->getIssueFieldOption(
    fieldKey: 'foo',
    optionId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldKey` | `string` | The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:<br/><br/> *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.<br/> *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"` |
| `optionId` | `int` | The ID of the option to be returned. |

#### Response

Source: [`Jira\Client\Schema\IssueFieldOption`](/docs/schema/issue-field-option.md)

Details of the options for a select list issue field.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The unique identifier for the option. This is only unique within the select field's set of options. |
| `value` | `string` | The option's name, which is displayed in Jira. |
| `config` | [`IssueFieldOptionConfiguration`](/docs/schema/issue-field-option-configuration.md) |  |
| `properties` | `array<string,mixed>` | The properties of the object, as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see [Issue Field Option Property Index](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/)) are defined in the descriptor for the issue field module. |


## Update Issue Field Option
<a name="updateIssueFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options-apps/#api-rest-api-3-field-field-key-option-option-id-put

Updates or creates an option for a select list issue field.
This operation requires that the option ID is provided when creating an option, therefore, the option ID needs to be specified as a path and body parameter.
The option ID provided in the path and body must be identical

Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource

**"Permissions" required:** *Administer Jira* "global permission".
Jira permissions are not required for the app providing the field.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\IssueFieldOption $response */
$response = $client->updateIssueFieldOption(
    request: new Schema\IssueFieldOption(
        config: [
                'attributes' => [
                ],
                'scope' => [
                    'global' => [
                    ],
                    'projects' => [
                    ],
                    'projects2' => [
                        0 => [
                            'attributes' => [
                                0 => 'notSelectable',
                            ],
                            'id' => '1001',
                        ],
                        1 => [
                            'attributes' => [
                                0 => 'notSelectable',
                            ],
                            'id' => '1002',
                        ],
                    ],
                ],
            ],
        id: '1',
        properties: [
                'description' => 'The team\\\'s description',
                'founded' => '2016-06-06',
                'leader' => [
                    'email' => 'lname@example.com',
                    'name' => 'Leader Name',
                ],
                'members' => '42',
            ],
        value: 'Team 1',
    )
    fieldKey: 'foo',
    optionId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueFieldOption`](/docs/schema/issue-field-option.md)

Details of the options for a select list issue field.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The unique identifier for the option. This is only unique within the select field's set of options. |
| `value` | `string` | The option's name, which is displayed in Jira. |
| `config` | [`IssueFieldOptionConfiguration`](/docs/schema/issue-field-option-configuration.md) |  |
| `properties` | `array<string,mixed>` | The properties of the object, as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see [Issue Field Option Property Index](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/)) are defined in the descriptor for the issue field module. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldKey` | `string` | The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:<br/><br/> *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.<br/> *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"` |
| `optionId` | `int` | The ID of the option to be updated. |

#### Response

Source: [`Jira\Client\Schema\IssueFieldOption`](/docs/schema/issue-field-option.md)

Details of the options for a select list issue field.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The unique identifier for the option. This is only unique within the select field's set of options. |
| `value` | `string` | The option's name, which is displayed in Jira. |
| `config` | [`IssueFieldOptionConfiguration`](/docs/schema/issue-field-option-configuration.md) |  |
| `properties` | `array<string,mixed>` | The properties of the object, as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see [Issue Field Option Property Index](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/)) are defined in the descriptor for the issue field module. |


## Delete Issue Field Option
<a name="deleteIssueFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options-apps/#api-rest-api-3-field-field-key-option-option-id-delete

Deletes an option from a select list issue field

Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource

**"Permissions" required:** *Administer Jira* "global permission".
Jira permissions are not required for the app providing the field.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteIssueFieldOption(
    fieldKey: 'foo',
    optionId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldKey` | `string` | The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:<br/><br/> *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.<br/> *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"` |
| `optionId` | `int` | The ID of the option to be deleted. |

#### Response

`true`
## Replace Issue Field Option
<a name="replaceIssueFieldOption"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-options-apps/#api-rest-api-3-field-field-key-option-option-id-issue-delete

Deselects an issue-field select-list option from all issues where it is selected.
A different option can be selected to replace the deselected option.
The update can also be limited to a smaller set of issues by using a JQL query

Connect and Forge app users with *Administer Jira* "global permission" can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`

This is an "asynchronous operation".
The response object contains a link to the long-running task

Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the "Issue custom field options" resource

**"Permissions" required:** *Administer Jira* "global permission".
Jira permissions are not required for the app providing the field.
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\TaskProgressBeanRemoveOptionFromIssuesResult $response */
$response = $client->replaceIssueFieldOption(
    fieldKey: 'foo',
    optionId: 1234,
    replaceWith: null,
    jql: null,
    overrideScreenSecurity: false,
    overrideEditableFlag: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldKey` | `string` | The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:<br/><br/> *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.<br/> *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"` |
| `optionId` | `int` | The ID of the option to be deselected. |
| `replaceWith` | `?int` | The ID of the option that will replace the currently selected option. |
| `jql` | `?string` | A JQL query that specifies the issues to be updated. For example, *project=10000*. |
| `overrideScreenSecurity` | `?bool` | Whether screen security is overridden to enable hidden fields to be edited. Available to Connect and Forge app users with admin permission. |
| `overrideEditableFlag` | `?bool` | Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). |

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
