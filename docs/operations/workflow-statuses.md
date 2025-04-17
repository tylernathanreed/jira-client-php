# Workflow Statuses

Source: [`Jira\Client\Operations\WorkflowStatuses`](/src/Operations/WorkflowStatuses.php)

## Operations

- [Get All Statuses](#getStatuses)
- [Get Status](#getStatus)

## Get All Statuses
<a name="getStatuses"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-statuses/#api-rest-api-3-status-get

Returns a list of all statuses associated with active workflows

This operation can be accessed anonymously

"Permissions" required: *Browse projects* "project permission" for the project.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/

### Example

```php
/** @var array $response */
$response = $client->getStatuses();
```

### Request

#### Response


## Get Status
<a name="getStatus"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-statuses/#api-rest-api-3-status-id-or-name-get

Returns a status.
The status must be associated with an active workflow to be returned

If a name is used on more than one status, only the status found first is returned.
Therefore, identifying the status by its ID may be preferable

This operation can be accessed anonymously

"Permissions" required: *Browse projects* "project permission" for the project.
See: https://support.atlassian.com/jira-cloud-administration/docs/manage-project-permissions/

### Example

```php
/** @var Schema\StatusDetails $response */
$response = $client->getStatus(
    idOrName: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `idOrName` | `string` | The ID or name of the status. |

#### Response

Source: [`Jira\Client\Schema\StatusDetails`](/docs/schema/status-details.md)

A status.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the status. |
| `iconUrl` | `string` | The URL of the icon used to represent the status. |
| `id` | `string` | The ID of the status. |
| `name` | `string` | The name of the status. |
| `scope` | [`Scope`](/docs/schema/scope.md) | The scope of the field. |
| `self` | `string` | The URL of the status. |
| `statusCategory` | [`StatusCategory`](/docs/schema/status-category.md) | The category assigned to the status. |
