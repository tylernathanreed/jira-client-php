# Workflow Status Categories

Source: [`Jira\Client\Operations\WorkflowStatusCategories`](/src/Operations/WorkflowStatusCategories.php)

## Operations

- [Get All Status Categories](#getStatusCategories)
- [Get Status Category](#getStatusCategory)

## Get All Status Categories
<a name="getStatusCategories"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-status-categories/#api-rest-api-3-statuscategory-get

Returns a list of all status categories

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var array $response */
$response = $client->getStatusCategories();
```

### Request

#### Response


## Get Status Category
<a name="getStatusCategory"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-status-categories/#api-rest-api-3-statuscategory-id-or-key-get

Returns a status category.
Status categories provided a mechanism for categorizing "statuses"

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\StatusCategory $response */
$response = $client->getStatusCategory(
    idOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `idOrKey` | `string` | The ID or key of the status category. |

#### Response

Source: [`Jira\Client\Schema\StatusCategory`](/docs/schema/status-category.md)

A status category.

| Property | Type | Description |
| --- | --- | --- |
| `colorName` | `string` | The name of the color used to represent the status category. |
| `id` | `int` | The ID of the status category. |
| `key` | `string` | The key of the status category. |
| `name` | `string` | The name of the status category. |
| `self` | `string` | The URL of the status category. |
