# Workflow Schemes

DummyDescription

Source: [`Jira\Client\Operations\WorkflowSchemes`](/src/Operations/WorkflowSchemes.php)

## Operations

- [Get All Workflow Schemes](#getAllWorkflowSchemes)
- [Create Workflow Scheme](#createWorkflowScheme)
- [Bulk Get Workflow Schemes](#readWorkflowSchemes)
- [Update Workflow Scheme](#updateSchemes)
- [Get Required Status Mappings For Workflow Scheme Update](#updateWorkflowSchemeMappings)
- [Get Workflow Scheme](#getWorkflowScheme)
- [Classic Update Workflow Scheme](#updateWorkflowScheme)
- [Delete Workflow Scheme](#deleteWorkflowScheme)
- [Get Default Workflow](#getDefaultWorkflow)
- [Update Default Workflow](#updateDefaultWorkflow)
- [Delete Default Workflow](#deleteDefaultWorkflow)
- [Get Workflow For Issue Type In Workflow Scheme](#getWorkflowSchemeIssueType)
- [Set Workflow For Issue Type In Workflow Scheme](#setWorkflowSchemeIssueType)
- [Delete Workflow For Issue Type In Workflow Scheme](#deleteWorkflowSchemeIssueType)
- [Get Issue Types For Workflows In Workflow Scheme](#getWorkflow)
- [Set Issue Types For Workflow In Workflow Scheme](#updateWorkflowMapping)
- [Delete Issue Types For Workflow In Workflow Scheme](#deleteWorkflowMapping)
- [Get Projects Which Are Using A Given Workflow Scheme](#getProjectUsagesForWorkflowScheme)

## Get All Workflow Schemes
<a name="getAllWorkflowSchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-get

Returns a "paginated" list of all workflow schemes, not including draft workflow schemes

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\PageBeanWorkflowScheme $response */
$response = $client->getAllWorkflowSchemes(
    startAt: 0,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanWorkflowScheme`](/docs/schema/page-bean-workflow-scheme.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<WorkflowScheme>`](/docs/schema/workflow-scheme.md) | The list of items. |


## Create Workflow Scheme
<a name="createWorkflowScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-post

Creates a workflow scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowScheme $response */
$response = $client->createWorkflowScheme(new Schema\WorkflowScheme(
    defaultWorkflow: 'jira',
    description: 'The description of the example workflow scheme.',
    issueTypeMappings: [
                10000 => 'scrum workflow',
                10001 => 'builds workflow',
            ],
    name: 'Example workflow scheme',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |

#### Response

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |


## Bulk Get Workflow Schemes
<a name="readWorkflowSchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-read-post

Returns a list of workflow schemes by providing workflow scheme IDs or project IDs

**"Permissions" required:**

 - *Administer Jira* global permission to access all, including project-scoped, workflow schemes
 - *Administer projects* project permissions to access project-scoped workflow schemes

### Example

```php
use Jira\Client\Schema;

/** @var array $response */
$response = $client->readWorkflowSchemes(
    request: new Schema\WorkflowSchemeReadRequest(
        projectIds: [
                '10047',
                '10048',
            ],
        workflowSchemeIds: [
                '3e59db0f-ed6c-47ce-8d50-80c0c4572677',
            ],
    )
    expand: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowSchemeReadRequest`](/docs/schema/workflow-scheme-read-request.md)

The workflow scheme read request body.

| Property | Type | Description |
| --- | --- | --- |
| `projectIds` | `?list<string>` | The list of project IDs to query. |
| `workflowSchemeIds` | `?list<string>` | The list of workflow scheme IDs to query. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `expand` | `?string` | Deprecated. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/changelog/#CHANGE-2298) for details.<br/><br/>Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:<br/><br/> *  `workflows.usages` Returns the project and issue types that each workflow in the workflow scheme is associated with. |

#### Response


## Update Workflow Scheme
<a name="updateSchemes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-update-post

Updates company-managed and team-managed project workflow schemes.
This API doesn't have a concept of draft, so any changes made to a workflow scheme are immediately available.
When changing the available statuses for issue types, an "asynchronous task" migrates the issues as defined in the provided mappings

**"Permissions" required:**

 - *Administer Jira* project permission to update all, including global-scoped, workflow schemes
 - *Administer projects* project permission to update project-scoped workflow schemes.


### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowSchemeUpdateRequest`](/docs/schema/workflow-scheme-update-request.md)

The update workflow scheme payload.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The new description for this workflow scheme. |
| `id` | `string` | The ID of this workflow scheme. |
| `name` | `string` | The new name for this workflow scheme. |
| `version` | [`DocumentVersion`](/docs/schema/document-version.md) |  |
| `defaultWorkflowId` | `string` | The ID of the workflow for issue types without having a mapping defined in this workflow scheme. Only used in global-scoped workflow schemes. If the `defaultWorkflowId` isn't specified, this is set to *Jira Workflow (jira)*. |
| `statusMappingsByIssueTypeOverride` | [`?list<MappingsByIssueTypeOverride>`](/docs/schema/mappings-by-issue-type-override.md) | Overrides, for the selected issue types, any status mappings provided in `statusMappingsByWorkflows`. Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has. Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`. |
| `statusMappingsByWorkflows` | [`?list<MappingsByWorkflow>`](/docs/schema/mappings-by-workflow.md) | The status mappings by workflows. Status mappings are required when the new workflow for an issue type doesn't contain all statuses that the old workflow has. Status mappings can be provided by a combination of `statusMappingsByWorkflows` and `statusMappingsByIssueTypeOverride`. |
| `workflowsForIssueTypes` | [`?list<WorkflowSchemeAssociation>`](/docs/schema/workflow-scheme-association.md) | Mappings from workflows to issue types. |

#### Response

`true`
## Get Required Status Mappings For Workflow Scheme Update
<a name="updateWorkflowSchemeMappings"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-update-mappings-post

Gets the required status mappings for the desired changes to a workflow scheme.
The results are provided per issue type and workflow.
When updating a workflow scheme, status mappings can be provided per issue type, per workflow, or both

**"Permissions" required:**

 - *Administer Jira* permission to update all, including global-scoped, workflow schemes
 - *Administer projects* project permission to update project-scoped workflow schemes.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowSchemeUpdateRequiredMappingsResponse $response */
$response = $client->updateWorkflowSchemeMappings(new Schema\WorkflowSchemeUpdateRequiredMappingsRequest(
    defaultWorkflowId: '10010',
    id: '10001',
    workflowsForIssueTypes: [
                [
                    'issueTypeIds' => [
                        '10010',
                        '10011',
                    ],
                    'workflowId' => '10001',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowSchemeUpdateRequiredMappingsRequest`](/docs/schema/workflow-scheme-update-required-mappings-request.md)

The request payload to get the required mappings for updating a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the workflow scheme. |
| `workflowsForIssueTypes` | [`list<WorkflowSchemeAssociation>`](/docs/schema/workflow-scheme-association.md) | The new workflow to issue type mappings for this workflow scheme. |
| `defaultWorkflowId` | `string` | The ID of the new default workflow for this workflow scheme. Only used in global-scoped workflow schemes. If it isn't specified, is set to *Jira Workflow (jira)*. |

#### Response

Source: [`Jira\Client\Schema\WorkflowSchemeUpdateRequiredMappingsResponse`](/docs/schema/workflow-scheme-update-required-mappings-response.md)

| Property | Type | Description |
| --- | --- | --- |
| `statusMappingsByIssueTypes` | [`?list<RequiredMappingByIssueType>`](/docs/schema/required-mapping-by-issue-type.md) | The list of required status mappings by issue type. |
| `statusMappingsByWorkflows` | [`?list<RequiredMappingByWorkflows>`](/docs/schema/required-mapping-by-workflows.md) | The list of required status mappings by workflow. |
| `statuses` | [`?list<StatusMetadata>`](/docs/schema/status-metadata.md) | The details of the statuses in the associated workflows. |
| `statusesPerWorkflow` | [`?list<StatusesPerWorkflow>`](/docs/schema/statuses-per-workflow.md) | The statuses associated with each workflow. |


## Get Workflow Scheme
<a name="getWorkflowScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-get

Returns a workflow scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\WorkflowScheme $response */
$response = $client->getWorkflowScheme(
    id: 1234,
    returnDraftIfExists: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*. |
| `returnDraftIfExists` | `?bool` | Returns the workflow scheme's draft rather than scheme itself, if set to true. If the workflow scheme does not have a draft, then the workflow scheme is returned. |

#### Response

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |


## Classic Update Workflow Scheme
<a name="updateWorkflowScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-put

Updates a company-manged project workflow scheme, including the name, default workflow, issue type to project mappings, and more.
If the workflow scheme is active (that is, being used by at least one project), then a draft workflow scheme is created or updated instead, provided that `updateDraftIfNeeded` is set to `true`

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowScheme $response */
$response = $client->updateWorkflowScheme(
    request: new Schema\WorkflowScheme(
        defaultWorkflow: 'jira',
        description: 'The description of the example workflow scheme.',
        issueTypeMappings: [
                10000 => 'scrum workflow',
            ],
        name: 'Example workflow scheme',
        updateDraftIfNeeded: false,
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*. |

#### Response

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |


## Delete Workflow Scheme
<a name="deleteWorkflowScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-delete

Deletes a workflow scheme.
Note that a workflow scheme cannot be deleted if it is active (that is, being used by at least one project)

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteWorkflowScheme(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*. |

#### Response

`true`
## Get Default Workflow
<a name="getDefaultWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-default-get

Returns the default workflow for a workflow scheme.
The default workflow is the workflow that is assigned any issue types that have not been mapped to any other workflow.
The default workflow has *All Unassigned Issue Types* listed in its issue types for the workflow scheme in Jira

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\DefaultWorkflow $response */
$response = $client->getDefaultWorkflow(
    id: 1234,
    returnDraftIfExists: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. |
| `returnDraftIfExists` | `?bool` | Set to `true` to return the default workflow for the workflow scheme's draft rather than scheme itself. If the workflow scheme does not have a draft, then the default workflow for the workflow scheme is returned. |

#### Response

Source: [`Jira\Client\Schema\DefaultWorkflow`](/docs/schema/default-workflow.md)

Details about the default workflow.

| Property | Type | Description |
| --- | --- | --- |
| `workflow` | `string` | The name of the workflow to set as the default workflow. |
| `updateDraftIfNeeded` | `bool` | Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new default workflow. Defaults to `false`. |


## Update Default Workflow
<a name="updateDefaultWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-default-put

Sets the default workflow for a workflow scheme

Note that active workflow schemes cannot be edited.
If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request object and a draft workflow scheme is created or updated with the new default workflow.
The draft workflow scheme can be published in Jira

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowScheme $response */
$response = $client->updateDefaultWorkflow(
    request: new Schema\DefaultWorkflow(
        updateDraftIfNeeded: false,
        workflow: 'jira',
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\DefaultWorkflow`](/docs/schema/default-workflow.md)

Details about the default workflow.

| Property | Type | Description |
| --- | --- | --- |
| `workflow` | `string` | The name of the workflow to set as the default workflow. |
| `updateDraftIfNeeded` | `bool` | Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new default workflow. Defaults to `false`. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. |

#### Response

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |


## Delete Default Workflow
<a name="deleteDefaultWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-default-delete

Resets the default workflow for a workflow scheme.
That is, the default workflow is set to Jira's system workflow (the *jira* workflow)

Note that active workflow schemes cannot be edited.
If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the default workflow reset.
The draft workflow scheme can be published in Jira

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\WorkflowScheme $response */
$response = $client->deleteDefaultWorkflow(
    id: 1234,
    updateDraftIfNeeded: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. |
| `updateDraftIfNeeded` | `?bool` | Set to true to create or update the draft of a workflow scheme and delete the mapping from the draft, when the workflow scheme cannot be edited. Defaults to `false`. |

#### Response

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |


## Get Workflow For Issue Type In Workflow Scheme
<a name="getWorkflowSchemeIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-issuetype-issue-type-get

Returns the issue type-workflow mapping for an issue type in a workflow scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\IssueTypeWorkflowMapping $response */
$response = $client->getWorkflowSchemeIssueType(
    id: 1234,
    issueType: 'foo',
    returnDraftIfExists: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. |
| `issueType` | `string` | The ID of the issue type. |
| `returnDraftIfExists` | `?bool` | Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true. If no draft exists, the mapping from the workflow scheme is returned. |

#### Response

Source: [`Jira\Client\Schema\IssueTypeWorkflowMapping`](/docs/schema/issue-type-workflow-mapping.md)

Details about the mapping between an issue type and a workflow.

| Property | Type | Description |
| --- | --- | --- |
| `issueType` | `string` | The ID of the issue type. Not required if updating the issue type-workflow mapping. |
| `updateDraftIfNeeded` | `bool` | Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`. Only applicable when updating the workflow-issue types mapping. |
| `workflow` | `string` | The name of the workflow. |


## Set Workflow For Issue Type In Workflow Scheme
<a name="setWorkflowSchemeIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-issuetype-issue-type-put

Sets the workflow for an issue type in a workflow scheme

Note that active workflow schemes cannot be edited.
If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request body and a draft workflow scheme is created or updated with the new issue type-workflow mapping.
The draft workflow scheme can be published in Jira

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowScheme $response */
$response = $client->setWorkflowSchemeIssueType(
    request: new Schema\IssueTypeWorkflowMapping(
        issueType: '10000',
        updateDraftIfNeeded: false,
        workflow: 'jira',
    )
    id: 1234,
    issueType: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypeWorkflowMapping`](/docs/schema/issue-type-workflow-mapping.md)

Details about the mapping between an issue type and a workflow.

| Property | Type | Description |
| --- | --- | --- |
| `issueType` | `string` | The ID of the issue type. Not required if updating the issue type-workflow mapping. |
| `updateDraftIfNeeded` | `bool` | Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`. Only applicable when updating the workflow-issue types mapping. |
| `workflow` | `string` | The name of the workflow. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. |
| `issueType` | `string` | The ID of the issue type. |

#### Response

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |


## Delete Workflow For Issue Type In Workflow Scheme
<a name="deleteWorkflowSchemeIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-issuetype-issue-type-delete

Deletes the issue type-workflow mapping for an issue type in a workflow scheme

Note that active workflow schemes cannot be edited.
If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the issue type-workflow mapping deleted.
The draft workflow scheme can be published in Jira

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\WorkflowScheme $response */
$response = $client->deleteWorkflowSchemeIssueType(
    id: 1234,
    issueType: 'foo',
    updateDraftIfNeeded: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. |
| `issueType` | `string` | The ID of the issue type. |
| `updateDraftIfNeeded` | `?bool` | Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`. |

#### Response

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |


## Get Issue Types For Workflows In Workflow Scheme
<a name="getWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-workflow-get

Returns the workflow-issue type mappings for a workflow scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\IssueTypesWorkflowMapping $response */
$response = $client->getWorkflow(
    id: 1234,
    workflowName: null,
    returnDraftIfExists: false,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. |
| `workflowName` | `?string` | The name of a workflow in the scheme. Limits the results to the workflow-issue type mapping for the specified workflow. |
| `returnDraftIfExists` | `?bool` | Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true. If no draft exists, the mapping from the workflow scheme is returned. |

#### Response

Source: [`Jira\Client\Schema\IssueTypesWorkflowMapping`](/docs/schema/issue-types-workflow-mapping.md)

Details about the mapping between issue types and a workflow.

| Property | Type | Description |
| --- | --- | --- |
| `defaultMapping` | `bool` | Whether the workflow is the default workflow for the workflow scheme. |
| `issueTypes` | `?list<string>` | The list of issue type IDs. |
| `updateDraftIfNeeded` | `bool` | Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new workflow-issue types mapping. Defaults to `false`. |
| `workflow` | `string` | The name of the workflow. Optional if updating the workflow-issue types mapping. |


## Set Issue Types For Workflow In Workflow Scheme
<a name="updateWorkflowMapping"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-workflow-put

Sets the issue types for a workflow in a workflow scheme.
The workflow can also be set as the default workflow for the workflow scheme.
Unmapped issues types are mapped to the default workflow

Note that active workflow schemes cannot be edited.
If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request body and a draft workflow scheme is created or updated with the new workflow-issue types mappings.
The draft workflow scheme can be published in Jira

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowScheme $response */
$response = $client->updateWorkflowMapping(
    request: new Schema\IssueTypesWorkflowMapping(
        issueTypes: [
                '10000',
            ],
        updateDraftIfNeeded: true,
        workflow: 'jira',
    )
    id: 1234,
    workflowName: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\IssueTypesWorkflowMapping`](/docs/schema/issue-types-workflow-mapping.md)

Details about the mapping between issue types and a workflow.

| Property | Type | Description |
| --- | --- | --- |
| `defaultMapping` | `bool` | Whether the workflow is the default workflow for the workflow scheme. |
| `issueTypes` | `?list<string>` | The list of issue type IDs. |
| `updateDraftIfNeeded` | `bool` | Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new workflow-issue types mapping. Defaults to `false`. |
| `workflow` | `string` | The name of the workflow. Optional if updating the workflow-issue types mapping. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. |
| `workflowName` | `string` | The name of the workflow. |

#### Response

Source: [`Jira\Client\Schema\WorkflowScheme`](/docs/schema/workflow-scheme.md)

Details about a workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `defaultWorkflow` | `string` | The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*. |
| `description` | `string` | The description of the workflow scheme. |
| `draft` | `bool` | Whether the workflow scheme is a draft or not. |
| `id` | `int` | The ID of the workflow scheme. |
| `issueTypeMappings` | `array<string,string>` | The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `issueTypes` | [`array<string,IssueTypeDetails>`](/docs/schema/issue-type-details.md) | The issue types available in Jira. |
| `lastModified` | `string` | The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `lastModifiedUser` | [`User`](/docs/schema/user.md) | The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows. |
| `name` | `string` | The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme. |
| `originalDefaultWorkflow` | `string` | For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. |
| `originalIssueTypeMappings` | `array<string,string>` | For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme. |
| `self` | `string` |  |
| `updateDraftIfNeeded` | `bool` | Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:<br/><br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.<br/> *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.<br/> *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.<br/><br/>Defaults to `false`. |


## Delete Issue Types For Workflow In Workflow Scheme
<a name="deleteWorkflowMapping"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-id-workflow-delete

Deletes the workflow-issue type mapping for a workflow in a workflow scheme

Note that active workflow schemes cannot be edited.
If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the workflow-issue type mapping deleted.
The draft workflow scheme can be published in Jira

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme. |
| `workflowName` | `string` | The name of the workflow. |
| `updateDraftIfNeeded` | `?bool` | Set to true to create or update the draft of a workflow scheme and delete the mapping from the draft, when the workflow scheme cannot be edited. Defaults to `false`. |

#### Response

`true`
## Get Projects Which Are Using A Given Workflow Scheme
<a name="getProjectUsagesForWorkflowScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-schemes/#api-rest-api-3-workflowscheme-workflow-scheme-id-project-usages-get

Returns a page of projects using a given workflow scheme.

### Example

```php
/** @var Schema\WorkflowSchemeProjectUsageDTO $response */
$response = $client->getProjectUsagesForWorkflowScheme(
    workflowSchemeId: 'foo',
    nextPageToken: null,
    maxResults: 50,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `workflowSchemeId` | `string` | The workflow scheme ID |
| `nextPageToken` | `?string` | The cursor for pagination |
| `maxResults` | `?int` | The maximum number of results to return. Must be an integer between 1 and 200. |

#### Response

Source: [`Jira\Client\Schema\WorkflowSchemeProjectUsageDTO`](/docs/schema/workflow-scheme-project-usage-d-t-o.md)

Projects using the workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `projects` | [`ProjectUsagePage`](/docs/schema/project-usage-page.md) |  |
| `workflowSchemeId` | `string` | The workflow scheme ID. |
