# Project Components

Source: [`Jira\Client\Operations\ProjectComponents`](/src/Operations/ProjectComponents.php)

## Operations

- [Find Components For Projects](#findComponentsForProjects)
- [Create Component](#createComponent)
- [Get Component](#getComponent)
- [Update Component](#updateComponent)
- [Delete Component](#deleteComponent)
- [Get Component Issues Count](#getComponentRelatedIssues)
- [Get Project Components Paginated](#getProjectComponentsPaginated)
- [Get Project Components](#getProjectComponents)

## Find Components For Projects
<a name="findComponentsForProjects"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-components/#api-rest-api-3-component-get

Returns a "paginated" list of all components in a project, including global (Compass) components when applicable

This operation can be accessed anonymously

**"Permissions" required:** *Browse Projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PageBean2ComponentJsonBean $response */
$response = $client->findComponentsForProjects(
    projectIdsOrKeys: null,
    startAt: 0,
    maxResults: 50,
    orderBy: null,
    query: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdsOrKeys` | `?list<string>` | The project IDs and/or project keys (case sensitive). |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `orderBy` | `'description'\|`<br/>`'-description'\|`<br/>`'+description'\|`<br/>`'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `description` Sorts by the component description.<br/> *  `name` Sorts by component name. |
| `query` | `?string` | Filter the results using a literal string. Components with a matching `name` or `description` are returned (case insensitive). |

#### Response

Source: [`Jira\Client\Schema\PageBean2ComponentJsonBean`](/docs/schema/page-bean2-component-json-bean.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ComponentJsonBean>`](/docs/schema/component-json-bean.md) | The list of items. |


## Create Component
<a name="createComponent"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-components/#api-rest-api-3-component-post

Creates a component.
Use components to provide containers for issues within a project.
Use components to provide containers for issues within a project

This operation can be accessed anonymously

**"Permissions" required:** *Administer projects* "project permission" for the project in which the component is created or *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectComponent $response */
$response = $client->createComponent(new Schema\ProjectComponent(
    assigneeType: 'PROJECT_LEAD',
    description: 'This is a Jira component',
    isAssigneeTypeValid: false,
    leadAccountId: '5b10a2844c20165700ede21g',
    name: 'Component 1',
    project: 'HSP',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectComponent`](/docs/schema/project-component.md)

Details about a project component.

| Property | Type | Description |
| --- | --- | --- |
| `ari` | `string` | Compass component's ID. Can't be updated. Not required for creating a Project Component. |
| `assignee` | [`User`](/docs/schema/user.md) | The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component. |
| `assigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Can take the following values:<br/><br/> *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.<br/> *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.<br/> *  `UNASSIGNED` an assignee is not set for issues created with this component.<br/> *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.<br/><br/>Default value: `PROJECT_DEFAULT`.  <br/>Optional when creating or updating a component. |
| `description` | `string` | The description for the component. Optional when creating or updating a component. |
| `id` | `string` | The unique identifier for the component. |
| `isAssigneeTypeValid` | `bool` | Whether a user is associated with `assigneeType`. For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned. |
| `lead` | [`User`](/docs/schema/user.md) | The user details for the component's lead user. |
| `leadAccountId` | `string` | The accountId of the component's lead user. The accountId uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `leadUserName` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `metadata` | `array<string,string>` | Compass component's metadata. Can't be updated. Not required for creating a Project Component. |
| `name` | `string` | The unique name for the component in the project. Required when creating a component. Optional when updating a component. The maximum length is 255 characters. |
| `project` | `string` | The key of the project the component is assigned to. Required when creating a component. Can't be updated. |
| `projectId` | `int` | The ID of the project the component is assigned to. |
| `realAssignee` | [`User`](/docs/schema/user.md) | The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee. |
| `realAssigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The type of the assignee that is assigned to issues created with this component, when an assignee cannot be set from the `assigneeType`. For example, `assigneeType` is set to `COMPONENT_LEAD` but no component lead is set. This property is set to one of the following values:<br/><br/> *  `PROJECT_LEAD` when `assigneeType` is `PROJECT_LEAD` and the project lead has permission to be assigned issues in the project that the component is in.<br/> *  `COMPONENT_LEAD` when `assignee`Type is `COMPONENT_LEAD` and the component lead has permission to be assigned issues in the project that the component is in.<br/> *  `UNASSIGNED` when `assigneeType` is `UNASSIGNED` and Jira is configured to allow unassigned issues.<br/> *  `PROJECT_DEFAULT` when none of the preceding cases are true. |
| `self` | `string` | The URL of the component. |

#### Response

Source: [`Jira\Client\Schema\ProjectComponent`](/docs/schema/project-component.md)

Details about a project component.

| Property | Type | Description |
| --- | --- | --- |
| `ari` | `string` | Compass component's ID. Can't be updated. Not required for creating a Project Component. |
| `assignee` | [`User`](/docs/schema/user.md) | The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component. |
| `assigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Can take the following values:<br/><br/> *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.<br/> *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.<br/> *  `UNASSIGNED` an assignee is not set for issues created with this component.<br/> *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.<br/><br/>Default value: `PROJECT_DEFAULT`.  <br/>Optional when creating or updating a component. |
| `description` | `string` | The description for the component. Optional when creating or updating a component. |
| `id` | `string` | The unique identifier for the component. |
| `isAssigneeTypeValid` | `bool` | Whether a user is associated with `assigneeType`. For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned. |
| `lead` | [`User`](/docs/schema/user.md) | The user details for the component's lead user. |
| `leadAccountId` | `string` | The accountId of the component's lead user. The accountId uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `leadUserName` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `metadata` | `array<string,string>` | Compass component's metadata. Can't be updated. Not required for creating a Project Component. |
| `name` | `string` | The unique name for the component in the project. Required when creating a component. Optional when updating a component. The maximum length is 255 characters. |
| `project` | `string` | The key of the project the component is assigned to. Required when creating a component. Can't be updated. |
| `projectId` | `int` | The ID of the project the component is assigned to. |
| `realAssignee` | [`User`](/docs/schema/user.md) | The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee. |
| `realAssigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The type of the assignee that is assigned to issues created with this component, when an assignee cannot be set from the `assigneeType`. For example, `assigneeType` is set to `COMPONENT_LEAD` but no component lead is set. This property is set to one of the following values:<br/><br/> *  `PROJECT_LEAD` when `assigneeType` is `PROJECT_LEAD` and the project lead has permission to be assigned issues in the project that the component is in.<br/> *  `COMPONENT_LEAD` when `assignee`Type is `COMPONENT_LEAD` and the component lead has permission to be assigned issues in the project that the component is in.<br/> *  `UNASSIGNED` when `assigneeType` is `UNASSIGNED` and Jira is configured to allow unassigned issues.<br/> *  `PROJECT_DEFAULT` when none of the preceding cases are true. |
| `self` | `string` | The URL of the component. |


## Get Component
<a name="getComponent"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-components/#api-rest-api-3-component-id-get

Returns a component

This operation can be accessed anonymously

**"Permissions" required:** *Browse projects* "project permission" for project containing the component.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\ProjectComponent $response */
$response = $client->getComponent(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the component. |

#### Response

Source: [`Jira\Client\Schema\ProjectComponent`](/docs/schema/project-component.md)

Details about a project component.

| Property | Type | Description |
| --- | --- | --- |
| `ari` | `string` | Compass component's ID. Can't be updated. Not required for creating a Project Component. |
| `assignee` | [`User`](/docs/schema/user.md) | The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component. |
| `assigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Can take the following values:<br/><br/> *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.<br/> *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.<br/> *  `UNASSIGNED` an assignee is not set for issues created with this component.<br/> *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.<br/><br/>Default value: `PROJECT_DEFAULT`.  <br/>Optional when creating or updating a component. |
| `description` | `string` | The description for the component. Optional when creating or updating a component. |
| `id` | `string` | The unique identifier for the component. |
| `isAssigneeTypeValid` | `bool` | Whether a user is associated with `assigneeType`. For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned. |
| `lead` | [`User`](/docs/schema/user.md) | The user details for the component's lead user. |
| `leadAccountId` | `string` | The accountId of the component's lead user. The accountId uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `leadUserName` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `metadata` | `array<string,string>` | Compass component's metadata. Can't be updated. Not required for creating a Project Component. |
| `name` | `string` | The unique name for the component in the project. Required when creating a component. Optional when updating a component. The maximum length is 255 characters. |
| `project` | `string` | The key of the project the component is assigned to. Required when creating a component. Can't be updated. |
| `projectId` | `int` | The ID of the project the component is assigned to. |
| `realAssignee` | [`User`](/docs/schema/user.md) | The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee. |
| `realAssigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The type of the assignee that is assigned to issues created with this component, when an assignee cannot be set from the `assigneeType`. For example, `assigneeType` is set to `COMPONENT_LEAD` but no component lead is set. This property is set to one of the following values:<br/><br/> *  `PROJECT_LEAD` when `assigneeType` is `PROJECT_LEAD` and the project lead has permission to be assigned issues in the project that the component is in.<br/> *  `COMPONENT_LEAD` when `assignee`Type is `COMPONENT_LEAD` and the component lead has permission to be assigned issues in the project that the component is in.<br/> *  `UNASSIGNED` when `assigneeType` is `UNASSIGNED` and Jira is configured to allow unassigned issues.<br/> *  `PROJECT_DEFAULT` when none of the preceding cases are true. |
| `self` | `string` | The URL of the component. |


## Update Component
<a name="updateComponent"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-components/#api-rest-api-3-component-id-put

Updates a component.
Any fields included in the request are overwritten.
If `leadAccountId` is an empty string ("") the component lead is removed

This operation can be accessed anonymously

**"Permissions" required:** *Administer projects* "project permission" for the project containing the component or *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectComponent $response */
$response = $client->updateComponent(
    request: new Schema\ProjectComponent(
        assigneeType: 'PROJECT_LEAD',
        description: 'This is a Jira component',
        isAssigneeTypeValid: false,
        leadAccountId: '5b10a2844c20165700ede21g',
        name: 'Component 1',
    )
    id: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectComponent`](/docs/schema/project-component.md)

Details about a project component.

| Property | Type | Description |
| --- | --- | --- |
| `ari` | `string` | Compass component's ID. Can't be updated. Not required for creating a Project Component. |
| `assignee` | [`User`](/docs/schema/user.md) | The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component. |
| `assigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Can take the following values:<br/><br/> *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.<br/> *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.<br/> *  `UNASSIGNED` an assignee is not set for issues created with this component.<br/> *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.<br/><br/>Default value: `PROJECT_DEFAULT`.  <br/>Optional when creating or updating a component. |
| `description` | `string` | The description for the component. Optional when creating or updating a component. |
| `id` | `string` | The unique identifier for the component. |
| `isAssigneeTypeValid` | `bool` | Whether a user is associated with `assigneeType`. For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned. |
| `lead` | [`User`](/docs/schema/user.md) | The user details for the component's lead user. |
| `leadAccountId` | `string` | The accountId of the component's lead user. The accountId uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `leadUserName` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `metadata` | `array<string,string>` | Compass component's metadata. Can't be updated. Not required for creating a Project Component. |
| `name` | `string` | The unique name for the component in the project. Required when creating a component. Optional when updating a component. The maximum length is 255 characters. |
| `project` | `string` | The key of the project the component is assigned to. Required when creating a component. Can't be updated. |
| `projectId` | `int` | The ID of the project the component is assigned to. |
| `realAssignee` | [`User`](/docs/schema/user.md) | The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee. |
| `realAssigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The type of the assignee that is assigned to issues created with this component, when an assignee cannot be set from the `assigneeType`. For example, `assigneeType` is set to `COMPONENT_LEAD` but no component lead is set. This property is set to one of the following values:<br/><br/> *  `PROJECT_LEAD` when `assigneeType` is `PROJECT_LEAD` and the project lead has permission to be assigned issues in the project that the component is in.<br/> *  `COMPONENT_LEAD` when `assignee`Type is `COMPONENT_LEAD` and the component lead has permission to be assigned issues in the project that the component is in.<br/> *  `UNASSIGNED` when `assigneeType` is `UNASSIGNED` and Jira is configured to allow unassigned issues.<br/> *  `PROJECT_DEFAULT` when none of the preceding cases are true. |
| `self` | `string` | The URL of the component. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the component. |

#### Response

Source: [`Jira\Client\Schema\ProjectComponent`](/docs/schema/project-component.md)

Details about a project component.

| Property | Type | Description |
| --- | --- | --- |
| `ari` | `string` | Compass component's ID. Can't be updated. Not required for creating a Project Component. |
| `assignee` | [`User`](/docs/schema/user.md) | The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component. |
| `assigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Can take the following values:<br/><br/> *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.<br/> *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.<br/> *  `UNASSIGNED` an assignee is not set for issues created with this component.<br/> *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.<br/><br/>Default value: `PROJECT_DEFAULT`.  <br/>Optional when creating or updating a component. |
| `description` | `string` | The description for the component. Optional when creating or updating a component. |
| `id` | `string` | The unique identifier for the component. |
| `isAssigneeTypeValid` | `bool` | Whether a user is associated with `assigneeType`. For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned. |
| `lead` | [`User`](/docs/schema/user.md) | The user details for the component's lead user. |
| `leadAccountId` | `string` | The accountId of the component's lead user. The accountId uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. |
| `leadUserName` | `string` | This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. |
| `metadata` | `array<string,string>` | Compass component's metadata. Can't be updated. Not required for creating a Project Component. |
| `name` | `string` | The unique name for the component in the project. Required when creating a component. Optional when updating a component. The maximum length is 255 characters. |
| `project` | `string` | The key of the project the component is assigned to. Required when creating a component. Can't be updated. |
| `projectId` | `int` | The ID of the project the component is assigned to. |
| `realAssignee` | [`User`](/docs/schema/user.md) | The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee. |
| `realAssigneeType` | `'PROJECT_DEFAULT'\|`<br/>`'COMPONENT_LEAD'\|`<br/>`'PROJECT_LEAD'\|`<br/>`'UNASSIGNED'\|`<br/>`null` | The type of the assignee that is assigned to issues created with this component, when an assignee cannot be set from the `assigneeType`. For example, `assigneeType` is set to `COMPONENT_LEAD` but no component lead is set. This property is set to one of the following values:<br/><br/> *  `PROJECT_LEAD` when `assigneeType` is `PROJECT_LEAD` and the project lead has permission to be assigned issues in the project that the component is in.<br/> *  `COMPONENT_LEAD` when `assignee`Type is `COMPONENT_LEAD` and the component lead has permission to be assigned issues in the project that the component is in.<br/> *  `UNASSIGNED` when `assigneeType` is `UNASSIGNED` and Jira is configured to allow unassigned issues.<br/> *  `PROJECT_DEFAULT` when none of the preceding cases are true. |
| `self` | `string` | The URL of the component. |


## Delete Component
<a name="deleteComponent"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-components/#api-rest-api-3-component-id-delete

Deletes a component

This operation can be accessed anonymously

**"Permissions" required:** *Administer projects* "project permission" for the project containing the component or *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteComponent(
    id: 'foo',
    moveIssuesTo: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the component. |
| `moveIssuesTo` | `?string` | The ID of the component to replace the deleted component. If this value is null no replacement is made. |

#### Response

`true`
## Get Component Issues Count
<a name="getComponentRelatedIssues"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-components/#api-rest-api-3-component-id-related-issue-counts-get

Returns the counts of issues assigned to the component

This operation can be accessed anonymously

**Deprecation notice:** The required OAuth 2.0 scopes will be updated on June 15, 2024

 - **Classic**: `read:jira-work`
 - **Granular**: `read:field:jira`, `read:project.component:jira`

**"Permissions" required:** None.

### Example

```php
/** @var Schema\ComponentIssuesCount $response */
$response = $client->getComponentRelatedIssues(
    id: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the component. |

#### Response

Source: [`Jira\Client\Schema\ComponentIssuesCount`](/docs/schema/component-issues-count.md)

Count of issues assigned to a component.

| Property | Type | Description |
| --- | --- | --- |
| `issueCount` | `int` | The count of issues assigned to a component. |
| `self` | `string` | The URL for this count of issues for a component. |


## Get Project Components Paginated
<a name="getProjectComponentsPaginated"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-components/#api-rest-api-3-project-project-id-or-key-component-get

Returns a "paginated" list of all components in a project.
See the "Get project components" resource if you want to get a full list of versions without pagination

If your project uses Compass components, this API will return a list of Compass components that are linked to issues in that project

This operation can be accessed anonymously

**"Permissions" required:** *Browse Projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var Schema\PageBeanComponentWithIssueCount $response */
$response = $client->getProjectComponentsPaginated(
    projectIdOrKey: 'foo',
    startAt: 0,
    maxResults: 50,
    orderBy: null,
    componentSource: 'jira',
    query: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `orderBy` | `'description'\|`<br/>`'-description'\|`<br/>`'+description'\|`<br/>`'issueCount'\|`<br/>`'-issueCount'\|`<br/>`'+issueCount'\|`<br/>`'lead'\|`<br/>`'-lead'\|`<br/>`'+lead'\|`<br/>`'name'\|`<br/>`'-name'\|`<br/>`'+name'\|`<br/>`null` | [Order](#ordering) the results by a field:<br/><br/> *  `description` Sorts by the component description.<br/> *  `issueCount` Sorts by the count of issues associated with the component.<br/> *  `lead` Sorts by the user key of the component's project lead.<br/> *  `name` Sorts by component name. |
| `componentSource` | `'jira'\|'compass'\|'auto'\|null` | The source of the components to return. Can be `jira` (default), `compass` or `auto`. When `auto` is specified, the API will return connected Compass components if the project is opted into Compass, otherwise it will return Jira components. Defaults to `jira`. |
| `query` | `?string` | Filter the results using a literal string. Components with a matching `name` or `description` are returned (case insensitive). |

#### Response

Source: [`Jira\Client\Schema\PageBeanComponentWithIssueCount`](/docs/schema/page-bean-component-with-issue-count.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<ComponentWithIssueCount>`](/docs/schema/component-with-issue-count.md) | The list of items. |


## Get Project Components
<a name="getProjectComponents"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-components/#api-rest-api-3-project-project-id-or-key-components-get

Returns all components in a project.
See the "Get project components paginated" resource if you want to get a full list of components with pagination

If your project uses Compass components, this API will return a paginated list of Compass components that are linked to issues in that project

This operation can be accessed anonymously

**"Permissions" required:** *Browse Projects* "project permission" for the project.
See: https://confluence.atlassian.com/x/yodKLg

### Example

```php
/** @var array $response */
$response = $client->getProjectComponents(
    projectIdOrKey: 'foo',
    componentSource: 'jira',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case sensitive). |
| `componentSource` | `'jira'\|'compass'\|'auto'\|null` | The source of the components to return. Can be `jira` (default), `compass` or `auto`. When `auto` is specified, the API will return connected Compass components if the project is opted into Compass, otherwise it will return Jira components. Defaults to `jira`. |

#### Response
