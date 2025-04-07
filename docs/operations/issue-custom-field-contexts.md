# Issue Custom Field Contexts

Source: [`Jira\Client\Operations\IssueCustomFieldContexts`](/src/Operations/IssueCustomFieldContexts.php)

## Operations

- [Get Custom Field Contexts](#getContextsForField)
- [Create Custom Field Context](#createCustomFieldContext)
- [Get Custom Field Contexts Default Values](#getDefaultValues)
- [Set Custom Field Contexts Default Values](#setDefaultValues)
- [Get Issue Types For Custom Field Context](#getIssueTypeMappingsForContexts)
- [Get Custom Field Contexts For Projects And Issue Types](#getCustomFieldContextsForProjectsAndIssueTypes)
- [Get Project Mappings For Custom Field Context](#getProjectContextMapping)
- [Update Custom Field Context](#updateCustomFieldContext)
- [Delete Custom Field Context](#deleteCustomFieldContext)
- [Add Issue Types To Context](#addIssueTypesToContext)
- [Remove Issue Types From Context](#removeIssueTypesFromContext)
- [Assign Custom Field Context To Projects](#assignProjectsToCustomFieldContext)
- [Remove Custom Field Context From Projects](#removeCustomFieldContextFromProjects)

## Get Custom Field Contexts
<a name="getContextsForField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-get

Returns a "paginated" list of " contexts" for a custom field.
Contexts can be returned as follows:

 - With no other parameters set, all contexts
 - By defining `id` only, all contexts from the list of IDs
 - By defining `isAnyIssueType`, limit the list of contexts returned to either those that apply to all issue types (true) or those that apply to only a subset of issue types (false)
 - By defining `isGlobalContext`, limit the list of contexts return to either those that apply to all projects (global contexts) (true) or those that apply to only a subset of projects (false)

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanCustomFieldContext $response */
$response = $client->getContextsForField(
    fieldId: 'foo',
    isAnyIssueType: null,
    isGlobalContext: null,
    contextId: null,
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `isAnyIssueType` | `?bool` | Whether to return contexts that apply to all issue types. |
| `isGlobalContext` | `?bool` | Whether to return contexts that apply to all projects. |
| `contextId` | `?list<int>` | The list of context IDs. To include multiple contexts, separate IDs with ampersand: `contextId=10000&contextId=10001`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanCustomFieldContext`](/docs/schema/page-bean-custom-field-context.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<CustomFieldContext>`](/docs/schema/custom-field-context.md) | The list of items. |


## Create Custom Field Context
<a name="createCustomFieldContext"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-post

Creates a custom field context

If `projectIds` is empty, a global context is created.
A global context is one that applies to all project.
If `issueTypeIds` is empty, the context applies to all issue types

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\CreateCustomFieldContext $response */
$response = $client->createCustomFieldContext(
    request: new Schema\CreateCustomFieldContext(
        description: 'A context used to define the custom field options for bugs.',
        issueTypeIds: [
                '10010',
            ],
        name: 'Bug fields context',
        projectIds: [
            ],
    )
    fieldId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CreateCustomFieldContext`](/docs/schema/create-custom-field-context.md)

The details of a created custom field context.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the context. |
| `description` | `string` | The description of the context. |
| `id` | `string` | The ID of the context. |
| `issueTypeIds` | `?list<string>` | The list of issue types IDs for the context. If the list is empty, the context refers to all issue types. |
| `projectIds` | `?list<string>` | The list of project IDs associated with the context. If the list is empty, the context is global. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |

#### Response

Source: [`Jira\Client\Schema\CreateCustomFieldContext`](/docs/schema/create-custom-field-context.md)

The details of a created custom field context.

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the context. |
| `description` | `string` | The description of the context. |
| `id` | `string` | The ID of the context. |
| `issueTypeIds` | `?list<string>` | The list of issue types IDs for the context. If the list is empty, the context refers to all issue types. |
| `projectIds` | `?list<string>` | The list of project IDs associated with the context. If the list is empty, the context is global. |


## Get Custom Field Contexts Default Values
<a name="getDefaultValues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-default-value-get

Returns a "paginated" list of defaults for a custom field.
The results can be filtered by `contextId`, otherwise all values are returned.
If no defaults are set for a context, nothing is returned.
 
The returned object depends on type of the custom field:

 - `CustomFieldContextDefaultValueDate` (type `datepicker`) for date fields
 - `CustomFieldContextDefaultValueDateTime` (type `datetimepicker`) for date-time fields
 - `CustomFieldContextDefaultValueSingleOption` (type `option.single`) for single choice select lists and radio buttons
 - `CustomFieldContextDefaultValueMultipleOption` (type `option.multiple`) for multiple choice select lists and checkboxes
 - `CustomFieldContextDefaultValueCascadingOption` (type `option.cascading`) for cascading select lists
 - `CustomFieldContextSingleUserPickerDefaults` (type `single.user.select`) for single users
 - `CustomFieldContextDefaultValueMultiUserPicker` (type `multi.user.select`) for user lists
 - `CustomFieldContextDefaultValueSingleGroupPicker` (type `grouppicker.single`) for single choice group pickers
 - `CustomFieldContextDefaultValueMultipleGroupPicker` (type `grouppicker.multiple`) for multiple choice group pickers
 - `CustomFieldContextDefaultValueURL` (type `url`) for URLs
 - `CustomFieldContextDefaultValueProject` (type `project`) for project pickers
 - `CustomFieldContextDefaultValueFloat` (type `float`) for floats (floating-point numbers)
 - `CustomFieldContextDefaultValueLabels` (type `labels`) for labels
 - `CustomFieldContextDefaultValueTextField` (type `textfield`) for text fields
 - `CustomFieldContextDefaultValueTextArea` (type `textarea`) for text area fields
 - `CustomFieldContextDefaultValueReadOnly` (type `readonly`) for read only (text) fields
 - `CustomFieldContextDefaultValueMultipleVersion` (type `version.multiple`) for single choice version pickers
 - `CustomFieldContextDefaultValueSingleVersion` (type `version.single`) for multiple choice version pickers

Forge custom fields "types" are also supported, returning:

 - `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields
 - `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields
 - `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields
 - `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields
 - `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields
 - `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields
 - `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields
 - `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields
 - `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanCustomFieldContextDefaultValue $response */
$response = $client->getDefaultValues(
    fieldId: 'foo',
    contextId: null,
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field, for example `customfield\_10000`. |
| `contextId` | `?list<int>` | The IDs of the contexts. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanCustomFieldContextDefaultValue`](/docs/schema/page-bean-custom-field-context-default-value.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<CustomFieldContextDefaultValue>`](/docs/schema/custom-field-context-default-value.md) | The list of items. |


## Set Custom Field Contexts Default Values
<a name="setDefaultValues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-default-value-put

Sets default for contexts of a custom field.
Default are defined using these objects:

 - `CustomFieldContextDefaultValueDate` (type `datepicker`) for date fields
 - `CustomFieldContextDefaultValueDateTime` (type `datetimepicker`) for date-time fields
 - `CustomFieldContextDefaultValueSingleOption` (type `option.single`) for single choice select lists and radio buttons
 - `CustomFieldContextDefaultValueMultipleOption` (type `option.multiple`) for multiple choice select lists and checkboxes
 - `CustomFieldContextDefaultValueCascadingOption` (type `option.cascading`) for cascading select lists
 - `CustomFieldContextSingleUserPickerDefaults` (type `single.user.select`) for single users
 - `CustomFieldContextDefaultValueMultiUserPicker` (type `multi.user.select`) for user lists
 - `CustomFieldContextDefaultValueSingleGroupPicker` (type `grouppicker.single`) for single choice group pickers
 - `CustomFieldContextDefaultValueMultipleGroupPicker` (type `grouppicker.multiple`) for multiple choice group pickers
 - `CustomFieldContextDefaultValueURL` (type `url`) for URLs
 - `CustomFieldContextDefaultValueProject` (type `project`) for project pickers
 - `CustomFieldContextDefaultValueFloat` (type `float`) for floats (floating-point numbers)
 - `CustomFieldContextDefaultValueLabels` (type `labels`) for labels
 - `CustomFieldContextDefaultValueTextField` (type `textfield`) for text fields
 - `CustomFieldContextDefaultValueTextArea` (type `textarea`) for text area fields
 - `CustomFieldContextDefaultValueReadOnly` (type `readonly`) for read only (text) fields
 - `CustomFieldContextDefaultValueMultipleVersion` (type `version.multiple`) for single choice version pickers
 - `CustomFieldContextDefaultValueSingleVersion` (type `version.single`) for multiple choice version pickers

Forge custom fields "types" are also supported, returning:

 - `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields
 - `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields
 - `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields
 - `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields
 - `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields
 - `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields
 - `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields
 - `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields
 - `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields

Only one type of default object can be included in a request.
To remove a default for a context, set the default parameter to `null`

**"Permissions" required:** *Administer Jira* "global permission".
See: https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->setDefaultValues(
    request: new Schema\CustomFieldContextDefaultValueUpdate(
        defaultValues: [
                [
                    'contextId' => '10100',
                    'optionId' => '10001',
                    'type' => 'option.single',
                ],
                [
                    'contextId' => '10101',
                    'optionId' => '10003',
                    'type' => 'option.single',
                ],
                [
                    'contextId' => '10103',
                    'optionId' => '10005',
                    'type' => 'option.single',
                ],
            ],
    )
    fieldId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CustomFieldContextDefaultValueUpdate`](/docs/schema/custom-field-context-default-value-update.md)

Default values to update.

| Property | Type | Description |
| --- | --- | --- |
| `defaultValues` | [`?list<CustomFieldContextDefaultValue>`](/docs/schema/custom-field-context-default-value.md) |  |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |

#### Response

`true`
## Get Issue Types For Custom Field Context
<a name="getIssueTypeMappingsForContexts"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-issuetypemapping-get

Returns a "paginated" list of context to issue type mappings for a custom field.
Mappings are returned for all contexts or a list of contexts.
Mappings are ordered first by context ID and then by issue type ID

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanIssueTypeToContextMapping $response */
$response = $client->getIssueTypeMappingsForContexts(
    fieldId: 'foo',
    contextId: null,
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `?list<int>` | The ID of the context. To include multiple contexts, provide an ampersand-separated list. For example, `contextId=10001&contextId=10002`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanIssueTypeToContextMapping`](/docs/schema/page-bean-issue-type-to-context-mapping.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<IssueTypeToContextMapping>`](/docs/schema/issue-type-to-context-mapping.md) | The list of items. |


## Get Custom Field Contexts For Projects And Issue Types
<a name="getCustomFieldContextsForProjectsAndIssueTypes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-mapping-post

Returns a "paginated" list of project and issue type mappings and, for each mapping, the ID of a "custom field context" that applies to the project and issue type

If there is no custom field context assigned to the project then, if present, the custom field context that applies to all projects is returned if it also applies to the issue type or all issue types.
If a custom field context is not found, the returned custom field context ID is `null`

Duplicate project and issue type mappings cannot be provided in the request

The order of the returned values is the same as provided in the request

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/k44fOw
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\PageBeanContextForProjectAndIssueType $response */
$response = $client->getCustomFieldContextsForProjectsAndIssueTypes(
    request: new Schema\ProjectIssueTypeMappings(
        mappings: [
                [
                    'issueTypeId' => '10000',
                    'projectId' => '10000',
                ],
                [
                    'issueTypeId' => '10001',
                    'projectId' => '10000',
                ],
                [
                    'issueTypeId' => '10002',
                    'projectId' => '10001',
                ],
            ],
    )
    fieldId: 'foo',
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectIssueTypeMappings`](/docs/schema/project-issue-type-mappings.md)

The project and issue type mappings.

| Property | Type | Description |
| --- | --- | --- |
| `mappings` | [`list<ProjectIssueTypeMapping>`](/docs/schema/project-issue-type-mapping.md) | The project and issue type mappings. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanContextForProjectAndIssueType`](/docs/schema/page-bean-context-for-project-and-issue-type.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ContextForProjectAndIssueType>`](/docs/schema/context-for-project-and-issue-type.md) | The list of items. |


## Get Project Mappings For Custom Field Context
<a name="getProjectContextMapping"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-projectmapping-get

Returns a "paginated" list of context to project mappings for a custom field.
The result can be filtered by `contextId`.
Otherwise, all mappings are returned.
Invalid IDs are ignored

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanCustomFieldContextProjectMapping $response */
$response = $client->getProjectContextMapping(
    fieldId: 'foo',
    contextId: null,
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field, for example `customfield\_10000`. |
| `contextId` | `?list<int>` | The list of context IDs. To include multiple context, separate IDs with ampersand: `contextId=10000&contextId=10001`. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanCustomFieldContextProjectMapping`](/docs/schema/page-bean-custom-field-context-project-mapping.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<CustomFieldContextProjectMapping>`](/docs/schema/custom-field-context-project-mapping.md) | The list of items. |


## Update Custom Field Context
<a name="updateCustomFieldContext"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-context-id-put

Updates a " custom field context"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateCustomFieldContext(
    request: new Schema\CustomFieldContextUpdateDetails(
        description: 'A context used to define the custom field options for bugs.',
        name: 'Bug fields context',
    )
    fieldId: 'foo',
    contextId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CustomFieldContextUpdateDetails`](/docs/schema/custom-field-context-update-details.md)

Details of a custom field context.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the custom field context. The maximum length is 255 characters. |
| `name` | `string` | The name of the custom field context. The name must be unique. The maximum length is 255 characters. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |

#### Response

`true`
## Delete Custom Field Context
<a name="deleteCustomFieldContext"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-context-id-delete

Deletes a " custom field context"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteCustomFieldContext(
    fieldId: 'foo',
    contextId: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |

#### Response

`true`
## Add Issue Types To Context
<a name="addIssueTypesToContext"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-context-id-issuetype-put

Adds issue types to a custom field context, appending the issue types to the issue types list

A custom field context without any issue types applies to all issue types.
Adding issue types to such a custom field context would result in it applying to only the listed issue types

If any of the issue types exists in the custom field context, the operation fails and no issue types are added

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->addIssueTypesToContext(
    request: new Schema\IssueTypeIds(
        issueTypeIds: [
                '10001',
                '10005',
                '10006',
            ],
    )
    fieldId: 'foo',
    contextId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeIds`](/docs/schema/issue-type-ids.md)

The list of issue type IDs.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeIds` | `list<string>` | The list of issue type IDs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |

#### Response

`true`
## Remove Issue Types From Context
<a name="removeIssueTypesFromContext"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-context-id-issuetype-remove-post

Removes issue types from a custom field context

A custom field context without any issue types applies to all issue types

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->removeIssueTypesFromContext(
    request: new Schema\IssueTypeIds(
        issueTypeIds: [
                '10001',
                '10005',
                '10006',
            ],
    )
    fieldId: 'foo',
    contextId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeIds`](/docs/schema/issue-type-ids.md)

The list of issue type IDs.

| Property | Type | Description |
| --- | --- | --- |
| `issueTypeIds` | `list<string>` | The list of issue type IDs. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |

#### Response

`true`
## Assign Custom Field Context To Projects
<a name="assignProjectsToCustomFieldContext"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-context-id-project-put

Assigns a custom field context to projects

If any project in the request is assigned to any context of the custom field, the operation fails

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->assignProjectsToCustomFieldContext(
    request: new Schema\ProjectIds(
        projectIds: [
                '10001',
                '10005',
                '10006',
            ],
    )
    fieldId: 'foo',
    contextId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectIds`](/docs/schema/project-ids.md)

A list of project IDs.

| Property | Type | Description |
| --- | --- | --- |
| `projectIds` | `list<string>` | The IDs of projects. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |

#### Response

`true`
## Remove Custom Field Context From Projects
<a name="removeCustomFieldContextFromProjects"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-custom-field-contexts/#api-rest-api-3-field-field-id-context-context-id-project-remove-post

Removes a custom field context from projects

A custom field context without any projects applies to all projects.
Removing all projects from a custom field context would result in it applying to all projects

If any project in the request is not assigned to the context, or the operation would result in two global contexts for the field, the operation fails

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->removeCustomFieldContextFromProjects(
    request: new Schema\ProjectIds(
        projectIds: [
                '10001',
                '10005',
                '10006',
            ],
    )
    fieldId: 'foo',
    contextId: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectIds`](/docs/schema/project-ids.md)

A list of project IDs.

| Property | Type | Description |
| --- | --- | --- |
| `projectIds` | `list<string>` | The IDs of projects. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |
| `contextId` | `int` | The ID of the context. |

#### Response

`true`
