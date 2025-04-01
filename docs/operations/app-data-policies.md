# App Data Policies

Source: [`Jira\Client\Operations\AppDataPolicies`](/src/Operations/AppDataPolicies.php)

## Operations

- [Get Data Policy For The Workspace](#getPolicy)
- [Get Data Policy For Projects](#getPolicies)

## Get Data Policy For The Workspace
<a name="getPolicy"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-data-policies/#api-rest-api-3-data-policy-get

Returns data policy for the workspace.

### Example

```php
/** @var Schema\WorkspaceDataPolicy $response */
$response = $client->getPolicy();
```

### Request

#### Response

Source: [`Jira\Client\Schema\WorkspaceDataPolicy`](/docs/schema/workspace-data-policy.md)

Details about data policy.

| Property | Type | Description |
| --- | --- | --- |
| `anyContentBlocked` | `bool` | Whether the workspace contains any content inaccessible to the requesting application. |


## Get Data Policy For Projects
<a name="getPolicies"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-app-data-policies/#api-rest-api-3-data-policy-project-get

Returns data policies for the projects specified in the request.

### Example

```php
/** @var Schema\ProjectDataPolicies $response */
$response = $client->getPolicies(
    ids: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `ids` | `?string` | A list of project identifiers. This parameter accepts a comma-separated list. |

#### Response

Source: [`Jira\Client\Schema\ProjectDataPolicies`](/docs/schema/project-data-policies.md)

Details about data policies for a list of projects.

| Property | Type | Description |
| --- | --- | --- |
| `projectDataPolicies` | [`?list<ProjectWithDataPolicy>`](/docs/schema/project-with-data-policy.md) | List of projects with data policies. |
