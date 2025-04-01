# Issue Fields

Source: [`Jira\Client\Operations\IssueFields`](/src/Operations/IssueFields.php)

## Operations

- [Get Fields](#getFields)
- [Create Custom Field](#createCustomField)
- [Get Fields Paginated](#getFieldsPaginated)
- [Get Fields In Trash Paginated](#getTrashedFieldsPaginated)
- [Update Custom Field](#updateCustomField)
- [Get Contexts For A Field](#getContextsForFieldDeprecated)
- [Delete Custom Field](#deleteCustomField)
- [Restore Custom Field From Trash](#restoreCustomField)
- [Move Custom Field To Trash](#trashCustomField)

## Get Fields
<a name="getFields"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-get

Returns system and custom issue fields according to the following rules:

 - Fields that cannot be added to the issue navigator are always returned
 - Fields that cannot be placed on an issue screen are always returned
 - Fields that depend on global Jira settings are only returned if the setting is enabled.
That is, timetracking fields, subtasks, votes, and watches
 - For all other fields, this operation only returns the fields that the user has permission to view (that is, the field is used in at least one project that the user has *Browse Projects* "project permission" for.)

This operation can be accessed anonymously

**"Permissions" required:** None.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getFields();
```

### Request

#### Response


## Create Custom Field
<a name="createCustomField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-post

Creates a custom field

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\FieldDetails $response */
$response = $client->createCustomField(new Schema\CustomFieldDefinitionJsonBean(
    description: 'Custom field for picking groups',
    name: 'New custom field',
    searcherKey: 'com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher',
    type: 'com.atlassian.jira.plugin.system.customfieldtypes:grouppicker',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\CustomFieldDefinitionJsonBean`](/docs/schema/custom-field-definition-json-bean.md)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the custom field, which is displayed in Jira. This is not the unique identifier. |
| `type` | `string` | The type of the custom field. These built-in custom field types are available:<br/><br/> *  `cascadingselect`: Enables values to be selected from two levels of select lists (value: `com.atlassian.jira.plugin.system.customfieldtypes:cascadingselect`)<br/> *  `datepicker`: Stores a date using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`)<br/> *  `datetime`: Stores a date with a time component (value: `com.atlassian.jira.plugin.system.customfieldtypes:datetime`)<br/> *  `float`: Stores and validates a numeric (floating point) input (value: `com.atlassian.jira.plugin.system.customfieldtypes:float`)<br/> *  `grouppicker`: Stores a user group using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:grouppicker`)<br/> *  `importid`: A read-only field that stores the ID the issue had in the system it was imported from (value: `com.atlassian.jira.plugin.system.customfieldtypes:importid`)<br/> *  `labels`: Stores labels (value: `com.atlassian.jira.plugin.system.customfieldtypes:labels`)<br/> *  `multicheckboxes`: Stores multiple values using checkboxes (value: ``)<br/> *  `multigrouppicker`: Stores multiple user groups using a picker control (value: ``)<br/> *  `multiselect`: Stores multiple values using a select list (value: `com.atlassian.jira.plugin.system.customfieldtypes:multicheckboxes`)<br/> *  `multiuserpicker`: Stores multiple users using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:multigrouppicker`)<br/> *  `multiversion`: Stores multiple versions from the versions available in a project using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:multiversion`)<br/> *  `project`: Stores a project from a list of projects that the user is permitted to view (value: `com.atlassian.jira.plugin.system.customfieldtypes:project`)<br/> *  `radiobuttons`: Stores a value using radio buttons (value: `com.atlassian.jira.plugin.system.customfieldtypes:radiobuttons`)<br/> *  `readonlyfield`: Stores a read-only text value, which can only be populated via the API (value: `com.atlassian.jira.plugin.system.customfieldtypes:readonlyfield`)<br/> *  `select`: Stores a value from a configurable list of options (value: `com.atlassian.jira.plugin.system.customfieldtypes:select`)<br/> *  `textarea`: Stores a long text string using a multiline text area (value: `com.atlassian.jira.plugin.system.customfieldtypes:textarea`)<br/> *  `textfield`: Stores a text string using a single-line text box (value: `com.atlassian.jira.plugin.system.customfieldtypes:textfield`)<br/> *  `url`: Stores a URL (value: `com.atlassian.jira.plugin.system.customfieldtypes:url`)<br/> *  `userpicker`: Stores a user using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:userpicker`)<br/> *  `version`: Stores a version using a picker control (value: `com.atlassian.jira.plugin.system.customfieldtypes:version`)<br/><br/>To create a field based on a [Forge custom field type](https://developer.atlassian.com/platform/forge/manifest-reference/modules/#jira-custom-field-type--beta-), use the ID of the Forge custom field type as the value. For example, `ari:cloud:ecosystem::extension/e62f20a2-4b61-4dbe-bfb9-9a88b5e3ac84/548c5df1-24aa-4f7c-bbbb-3038d947cb05/static/my-cf-type-key`. |
| `description` | `string` | The description of the custom field, which is displayed in Jira. |
| `searcherKey` | `'com.atlassian.jira.plugin.system.customfieldtypes:cascadingselectsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:daterange'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:datetimerange'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:exactnumber'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:exacttextsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:labelsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:multiselectsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:numberrange'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:projectsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:textsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:userpickergroupsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:versionsearcher'\|`<br/>`null` | The searcher defines the way the field is searched in Jira. For example, *com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher*.  <br/>The search UI (basic search and JQL search) will display different operations and values for the field, based on the field searcher. You must specify a searcher that is valid for the field type, as listed below (abbreviated values shown):<br/><br/> *  `cascadingselect`: `cascadingselectsearcher`<br/> *  `datepicker`: `daterange`<br/> *  `datetime`: `datetimerange`<br/> *  `float`: `exactnumber` or `numberrange`<br/> *  `grouppicker`: `grouppickersearcher`<br/> *  `importid`: `exactnumber` or `numberrange`<br/> *  `labels`: `labelsearcher`<br/> *  `multicheckboxes`: `multiselectsearcher`<br/> *  `multigrouppicker`: `multiselectsearcher`<br/> *  `multiselect`: `multiselectsearcher`<br/> *  `multiuserpicker`: `userpickergroupsearcher`<br/> *  `multiversion`: `versionsearcher`<br/> *  `project`: `projectsearcher`<br/> *  `radiobuttons`: `multiselectsearcher`<br/> *  `readonlyfield`: `textsearcher`<br/> *  `select`: `multiselectsearcher`<br/> *  `textarea`: `textsearcher`<br/> *  `textfield`: `textsearcher`<br/> *  `url`: `exacttextsearcher`<br/> *  `userpicker`: `userpickergroupsearcher`<br/> *  `version`: `versionsearcher`<br/><br/>If no searcher is provided, the field isn't searchable. However, [Forge custom fields](https://developer.atlassian.com/platform/forge/manifest-reference/modules/#jira-custom-field-type--beta-) have a searcher set automatically, so are always searchable. |

#### Response

Source: [`Jira\Client\Schema\FieldDetails`](/docs/schema/field-details.md)

Details about a field.

| Property | Type | Description |
| --- | --- | --- |
| `clauseNames` | `?list<string>` | The names that can be used to reference the field in an advanced search. For more information, see [Advanced searching - fields reference](https://confluence.atlassian.com/x/gwORLQ). |
| `custom` | `bool` | Whether the field is a custom field. |
| `id` | `string` | The ID of the field. |
| `key` | `string` | The key of the field. |
| `name` | `string` | The name of the field. |
| `navigable` | `bool` | Whether the field can be used as a column on the issue navigator. |
| `orderable` | `bool` | Whether the content of the field can be used to order lists. |
| `schema` | [`JsonTypeBean`](/docs/schema/json-type-bean.md) | The data schema for the field. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the field. |
| `searchable` | `bool` | Whether the content of the field can be searched. |


## Get Fields Paginated
<a name="getFieldsPaginated"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-search-get

Returns a "paginated" list of fields for Classic Jira projects.
The list can include:

 - all fields
 - specific fields, by defining `id`
 - fields that contain a string in the field name or description, by defining `query`
 - specific fields that contain a string in the field name or description, by defining `id` and `query`

Use `type` must be set to `custom` to show custom fields only

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanField $response */
$response = $client->getFieldsPaginated(
    startAt: 0,
    maxResults: 50,
    type: null,
    id: null,
    query: null,
    orderBy: null,
    expand: null,
    projectIds: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `type` | `?list<'custom'\|'system'>` | The type of fields to search. |
| `id` | `?list<string>` | The IDs of the custom fields to return or, where `query` is specified, filter. |
| `query` | `?string` | String used to perform a case-insensitive partial match with field names or descriptions. |
| `orderBy` | `'contextsCount'\|`<br/>`'-contextsCount'\|`<br/>`'+contextsCount'\|`<br/>`'lastUsed'\|`<br/>`'-lastUsed'\|`<br/>`'+lastUsed'\|`<br/>`'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'screensCount'\|`<br/>`'-screensCount'\|`<br/>`'+screensCount'\|`<br/>`'projectsCount'\|`<br/>`'-projectsCount'\|`<br/>`'+projectsCount'\|`<br/>`null` | [Order](#ordering) the results by:<br/><br/> *  `contextsCount` sorts by the number of contexts related to a field<br/> *  `lastUsed` sorts by the date when the value of the field last changed<br/> *  `name` sorts by the field name<br/> *  `screensCount` sorts by the number of screens related to a field |
| `expand` | `?string` | Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `key` returns the key for each field<br/> *  `stableId` returns the stableId for each field<br/> *  `lastUsed` returns the date when the value of the field last changed<br/> *  `screensCount` returns the number of screens related to a field<br/> *  `contextsCount` returns the number of contexts related to a field<br/> *  `isLocked` returns information about whether the field is locked<br/> *  `searcherKey` returns the searcher key for each custom field |
| `projectIds` | `?list<int>` |  |

#### Response

Source: [`Jira\Client\Schema\PageBeanField`](/docs/schema/page-bean-field.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Field>`](/docs/schema/field.md) | The list of items. |


## Get Fields In Trash Paginated
<a name="getTrashedFieldsPaginated"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-search-trashed-get

Returns a "paginated" list of fields in the trash.
The list may be restricted to fields whose field name or description partially match a string

Only custom fields can be queried, `type` must be set to `custom`

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanField $response */
$response = $client->getTrashedFieldsPaginated(
    startAt: 0,
    maxResults: 50,
    id: null,
    query: null,
    expand: null,
    orderBy: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `id` | `?list<string>` |  |
| `query` | `?string` | String used to perform a case-insensitive partial match with field names or descriptions. |
| `expand` | `'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`'trashDate'\|`<br/>`'-trashDate'\|`<br/>`'+trashDate'\|`<br/>`'plannedDeletionDate'\|`<br/>`'-plannedDeletionDate'\|`<br/>`'+plannedDeletionDate'\|`<br/>`'projectsCount'\|`<br/>`'-projectsCount'\|`<br/>`'+projectsCount'\|`<br/>`null` |  |
| `orderBy` | `?string` | [Order](#ordering) the results by a field:<br/><br/> *  `name` sorts by the field name<br/> *  `trashDate` sorts by the date the field was moved to the trash<br/> *  `plannedDeletionDate` sorts by the planned deletion date |

#### Response

Source: [`Jira\Client\Schema\PageBeanField`](/docs/schema/page-bean-field.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Field>`](/docs/schema/field.md) | The list of items. |


## Update Custom Field
<a name="updateCustomField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-field-id-put

Updates a custom field

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateCustomField(
    request: new Schema\UpdateCustomFieldDetails(
        description: 'Select the manager and the corresponding employee.',
        name: 'Managers and employees list',
        searcherKey: 'com.atlassian.jira.plugin.system.customfieldtypes:cascadingselectsearcher',
    )
    fieldId: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateCustomFieldDetails`](/docs/schema/update-custom-field-details.md)

Details of a custom field.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the custom field. The maximum length is 40000 characters. |
| `name` | `string` | The name of the custom field. It doesn't have to be unique. The maximum length is 255 characters. |
| `searcherKey` | `'com.atlassian.jira.plugin.system.customfieldtypes:cascadingselectsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:daterange'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:datetimerange'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:exactnumber'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:exacttextsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:grouppickersearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:labelsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:multiselectsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:numberrange'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:projectsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:textsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:userpickergroupsearcher'\|`<br/>`'com.atlassian.jira.plugin.system.customfieldtypes:versionsearcher'\|`<br/>`null` | The searcher that defines the way the field is searched in Jira. It can be set to `null`, otherwise you must specify the valid searcher for the field type, as listed below (abbreviated values shown):<br/><br/> *  `cascadingselect`: `cascadingselectsearcher`<br/> *  `datepicker`: `daterange`<br/> *  `datetime`: `datetimerange`<br/> *  `float`: `exactnumber` or `numberrange`<br/> *  `grouppicker`: `grouppickersearcher`<br/> *  `importid`: `exactnumber` or `numberrange`<br/> *  `labels`: `labelsearcher`<br/> *  `multicheckboxes`: `multiselectsearcher`<br/> *  `multigrouppicker`: `multiselectsearcher`<br/> *  `multiselect`: `multiselectsearcher`<br/> *  `multiuserpicker`: `userpickergroupsearcher`<br/> *  `multiversion`: `versionsearcher`<br/> *  `project`: `projectsearcher`<br/> *  `radiobuttons`: `multiselectsearcher`<br/> *  `readonlyfield`: `textsearcher`<br/> *  `select`: `multiselectsearcher`<br/> *  `textarea`: `textsearcher`<br/> *  `textfield`: `textsearcher`<br/> *  `url`: `exacttextsearcher`<br/> *  `userpicker`: `userpickergroupsearcher`<br/> *  `version`: `versionsearcher` |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the custom field. |

#### Response

`true`
## Get Contexts For A Field
<a name="getContextsForFieldDeprecated"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-field-id-contexts-get

Returns a "paginated" list of the contexts a field is used in.
Deprecated, use " Get custom field contexts"

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanContext $response */
$response = $client->getContextsForFieldDeprecated(
    fieldId: 'foo',
    startAt: 0,
    maxResults: 20,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `fieldId` | `string` | The ID of the field to return contexts for. |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanContext`](/docs/schema/page-bean-context.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Context>`](/docs/schema/context.md) | The list of items. |


## Delete Custom Field
<a name="deleteCustomField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-id-delete

Deletes a custom field.
The custom field is deleted whether it is in the trash or not.
See "Edit or delete a custom field" for more information on trashing and deleting custom fields

This operation is "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain subsequent updates

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/Z44fOw
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of a custom field. |

#### Response

Source: [`Jira\Client\Schema\TaskProgressBeanObject`](/docs/schema/task-progress-bean-object.md)

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
| `result` | `mixed` | The result of the task execution. |
| `started` | `int` | A timestamp recording when the task was started. |


## Restore Custom Field From Trash
<a name="restoreCustomField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-id-restore-post

Restores a custom field from trash.
See "Edit or delete a custom field" for more information on trashing and deleting custom fields

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/Z44fOw
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of a custom field. |

#### Response

`true`
## Move Custom Field To Trash
<a name="trashCustomField"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-issue-fields/#api-rest-api-3-field-id-trash-post

Moves a custom field to trash.
See "Edit or delete a custom field" for more information on trashing and deleting custom fields

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/Z44fOw
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of a custom field. |

#### Response

`true`
