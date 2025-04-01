# Workflow Scheme Project Associations

DummyDescription

Source: [`Jira\Client\Operations\WorkflowSchemeProjectAssociations`](/src/Operations/WorkflowSchemeProjectAssociations.php)

## Operations

- [Get Workflow Scheme Project Associations](#getWorkflowSchemeProjectAssociations)
- [Assign Workflow Scheme To Project](#assignSchemeToProject)

## Get Workflow Scheme Project Associations
<a name="getWorkflowSchemeProjectAssociations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-project-associations/#api-rest-api-3-workflowscheme-project-get

Returns a list of the workflow schemes associated with a list of projects.
Each returned workflow scheme includes a list of the requested projects associated with it.
Any team-managed or non-existent projects in the request are ignored and no errors are returned

If the project is associated with the `Default Workflow Scheme` no ID is returned.
This is because the way the `Default Workflow Scheme` is stored means it has no ID

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var Schema\ContainerOfWorkflowSchemeAssociations $response */
$response = $client->getWorkflowSchemeProjectAssociations(
    projectId: [1234],
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `list<int>` | The ID of a project to return the workflow schemes for. To include multiple projects, provide an ampersand-Jim: oneseparated list. For example, `projectId=10000&projectId=10001`. |

#### Response

Source: [`Jira\Client\Schema\ContainerOfWorkflowSchemeAssociations`](/docs/schema/container-of-workflow-scheme-associations.md)

A container for a list of workflow schemes together with the projects they are associated with.

| Property | Type | Description |
| --- | --- | --- |
| `values` | [`list<WorkflowSchemeAssociations>`](/docs/schema/workflow-scheme-associations.md) | A list of workflow schemes together with projects they are associated with. |


## Assign Workflow Scheme To Project
<a name="assignSchemeToProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-scheme-project-associations/#api-rest-api-3-workflowscheme-project-put

Assigns a workflow scheme to a project.
This operation is performed only when there are no issues in the project

Workflow schemes can only be assigned to classic projects

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->assignSchemeToProject(new Schema\WorkflowSchemeProjectAssociation(
    projectId: '10001',
    workflowSchemeId: '10032',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WorkflowSchemeProjectAssociation`](/docs/schema/workflow-scheme-project-association.md)

An associated workflow scheme and project.

| Property | Type | Description |
| --- | --- | --- |
| `projectId` | `string` | The ID of the project. |
| `workflowSchemeId` | `string` | The ID of the workflow scheme. If the workflow scheme ID is `null`, the operation assigns the default workflow scheme. |

#### Response

`true`
