# Workflow Scheme Drafts

Source: [`Jira\Client\Operations\WorkflowSchemeDrafts`](/src/Operations/WorkflowSchemeDrafts.php)

## Operations

- [Create Draft Workflow Scheme](#createWorkflowSchemeDraftFromParent)
- [Get Draft Workflow Scheme](#getWorkflowSchemeDraft)
- [Update Draft Workflow Scheme](#updateWorkflowSchemeDraft)
- [Delete Draft Workflow Scheme](#deleteWorkflowSchemeDraft)
- [Get Draft Default Workflow](#getDraftDefaultWorkflow)
- [Update Draft Default Workflow](#updateDraftDefaultWorkflow)
- [Delete Draft Default Workflow](#deleteDraftDefaultWorkflow)
- [Get Workflow For Issue Type In Draft Workflow Scheme](#getWorkflowSchemeDraftIssueType)
- [Set Workflow For Issue Type In Draft Workflow Scheme](#setWorkflowSchemeDraftIssueType)
- [Delete Workflow For Issue Type In Draft Workflow Scheme](#deleteWorkflowSchemeDraftIssueType)
- [Publish Draft Workflow Scheme](#publishDraftWorkflowScheme)
- [Get Issue Types For Workflows In Draft Workflow Scheme](#getDraftWorkflow)
- [Set Issue Types For Workflow In Workflow Scheme](#updateDraftWorkflowMapping)
- [Delete Issue Types For Workflow In Draft Workflow Scheme](#deleteDraftWorkflowMapping)

## Create Draft Workflow Scheme
<a name="createWorkflowSchemeDraftFromParent"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-createdraft-post

Create a draft workflow scheme from an active workflow scheme, by copying the active workflow scheme.
Note that an active workflow scheme can only have one draft workflow scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\WorkflowScheme $response */
$response = $client->createWorkflowSchemeDraftFromParent(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the active workflow scheme that the draft is created from. |

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


## Get Draft Workflow Scheme
<a name="getWorkflowSchemeDraft"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-get

Returns the draft workflow scheme for an active workflow scheme.
Draft workflow schemes allow changes to be made to the active workflow schemes: When an active workflow scheme is updated, a draft copy is created.
The draft is modified, then the changes in the draft are copied back to the active workflow scheme.
See "Configuring workflow schemes" for more information.
 
Note that:

 - Only active workflow schemes can have draft workflow schemes
 - An active workflow scheme can only have one draft workflow scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/tohKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\WorkflowScheme $response */
$response = $client->getWorkflowSchemeDraft(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the active workflow scheme that the draft was created from. |

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


## Update Draft Workflow Scheme
<a name="updateWorkflowSchemeDraft"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-put

Updates a draft workflow scheme.
If a draft workflow scheme does not exist for the active workflow scheme, then a draft is created.
Note that an active workflow scheme can only have one draft workflow scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowScheme $response */
$response = $client->updateWorkflowSchemeDraft(
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
| `id` | `int` | The ID of the active workflow scheme that the draft was created from. |

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


## Delete Draft Workflow Scheme
<a name="deleteWorkflowSchemeDraft"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-delete

Deletes a draft workflow scheme

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->deleteWorkflowSchemeDraft(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the active workflow scheme that the draft was created from. |

#### Response

`true`
## Get Draft Default Workflow
<a name="getDraftDefaultWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-default-get

Returns the default workflow for a workflow scheme's draft.
The default workflow is the workflow that is assigned any issue types that have not been mapped to any other workflow.
The default workflow has *All Unassigned Issue Types* listed in its issue types for the workflow scheme in Jira

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\DefaultWorkflow $response */
$response = $client->getDraftDefaultWorkflow(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |

#### Response

Source: [`Jira\Client\Schema\DefaultWorkflow`](/docs/schema/default-workflow.md)

Details about the default workflow.

| Property | Type | Description |
| --- | --- | --- |
| `workflow` | `string` | The name of the workflow to set as the default workflow. |
| `updateDraftIfNeeded` | `bool` | Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new default workflow. Defaults to `false`. |


## Update Draft Default Workflow
<a name="updateDraftDefaultWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-default-put

Sets the default workflow for a workflow scheme's draft

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowScheme $response */
$response = $client->updateDraftDefaultWorkflow(
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
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |

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


## Delete Draft Default Workflow
<a name="deleteDraftDefaultWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-default-delete

Resets the default workflow for a workflow scheme's draft.
That is, the default workflow is set to Jira's system workflow (the *jira* workflow)

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\WorkflowScheme $response */
$response = $client->deleteDraftDefaultWorkflow(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |

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


## Get Workflow For Issue Type In Draft Workflow Scheme
<a name="getWorkflowSchemeDraftIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-issuetype-issue-type-get

Returns the issue type-workflow mapping for an issue type in a workflow scheme's draft

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\IssueTypeWorkflowMapping $response */
$response = $client->getWorkflowSchemeDraftIssueType(
    id: 1234,
    issueType: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |
| `issueType` | `string` | The ID of the issue type. |

#### Response

Source: [`Jira\Client\Schema\IssueTypeWorkflowMapping`](/docs/schema/issue-type-workflow-mapping.md)

Details about the mapping between an issue type and a workflow.

| Property | Type | Description |
| --- | --- | --- |
| `issueType` | `string` | The ID of the issue type. Not required if updating the issue type-workflow mapping. |
| `updateDraftIfNeeded` | `bool` | Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`. Only applicable when updating the workflow-issue types mapping. |
| `workflow` | `string` | The name of the workflow. |


## Set Workflow For Issue Type In Draft Workflow Scheme
<a name="setWorkflowSchemeDraftIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-issuetype-issue-type-put

Sets the workflow for an issue type in a workflow scheme's draft

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowScheme $response */
$response = $client->setWorkflowSchemeDraftIssueType(
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
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |
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


## Delete Workflow For Issue Type In Draft Workflow Scheme
<a name="deleteWorkflowSchemeDraftIssueType"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-issuetype-issue-type-delete

Deletes the issue type-workflow mapping for an issue type in a workflow scheme's draft

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\WorkflowScheme $response */
$response = $client->deleteWorkflowSchemeDraftIssueType(
    id: 1234,
    issueType: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |
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


## Publish Draft Workflow Scheme
<a name="publishDraftWorkflowScheme"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-publish-post

Publishes a draft workflow scheme

Where the draft workflow includes new workflow statuses for an issue type, mappings are provided to update issues with the original workflow status to the new workflow status

This operation is "asynchronous".
Follow the `location` link in the response to determine the status of the task and use "Get task" to obtain updates

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->publishDraftWorkflowScheme(
    request: new Schema\PublishDraftWorkflowScheme(
        statusMappings: [
                [
                    'issueTypeId' => '10001',
                    'newStatusId' => '1',
                    'statusId' => '3',
                ],
                [
                    'issueTypeId' => '10001',
                    'newStatusId' => '2',
                    'statusId' => '2',
                ],
                [
                    'issueTypeId' => '10002',
                    'newStatusId' => '10003',
                    'statusId' => '10005',
                ],
                [
                    'issueTypeId' => '10003',
                    'newStatusId' => '1',
                    'statusId' => '4',
                ],
            ],
    )
    id: 1234,
    validateOnly: false,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\PublishDraftWorkflowScheme`](/docs/schema/publish-draft-workflow-scheme.md)

Details about the status mappings for publishing a draft workflow scheme.

| Property | Type | Description |
| --- | --- | --- |
| `statusMappings` | [`?list<StatusMapping>`](/docs/schema/status-mapping.md) | Mappings of statuses to new statuses for issue types. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |
| `validateOnly` | `?bool` | Whether the request only performs a validation. |

#### Response

`true`
## Get Issue Types For Workflows In Draft Workflow Scheme
<a name="getDraftWorkflow"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-workflow-get

Returns the workflow-issue type mappings for a workflow scheme's draft

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\IssueTypesWorkflowMapping $response */
$response = $client->getDraftWorkflow(
    id: 1234,
    workflowName: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |
| `workflowName` | `?string` | The name of a workflow in the scheme. Limits the results to the workflow-issue type mapping for the specified workflow. |

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
<a name="updateDraftWorkflowMapping"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-workflow-put

Sets the issue types for a workflow in a workflow scheme's draft.
The workflow can also be set as the default workflow for the draft workflow scheme.
Unmapped issues types are mapped to the default workflow

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WorkflowScheme $response */
$response = $client->updateDraftWorkflowMapping(
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
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |
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


## Delete Issue Types For Workflow In Draft Workflow Scheme
<a name="deleteDraftWorkflowMapping"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-drafts/#api-rest-api-3-workflowscheme-id-draft-workflow-delete

Deletes the workflow-issue type mapping for a workflow in a workflow scheme's draft

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg


### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the workflow scheme that the draft belongs to. |
| `workflowName` | `string` | The name of the workflow. |

#### Response

`true`
