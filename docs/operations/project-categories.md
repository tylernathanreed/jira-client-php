# Project Categories

Source: [`Jira\Client\Operations\ProjectCategories`](/src/Operations/ProjectCategories.php)

## Operations

- [Get All Project Categories](#getAllProjectCategories)
- [Create Project Category](#createProjectCategory)
- [Get Project Category By ID](#getProjectCategoryById)
- [Update Project Category](#updateProjectCategory)
- [Delete Project Category](#removeProjectCategory)

## Get All Project Categories
<a name="getAllProjectCategories"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-categories/#api-rest-api-3-project-category-get

Returns all project categories

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var array $response */
$response = $client->getAllProjectCategories();
```

### Request

#### Response


## Create Project Category
<a name="createProjectCategory"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-categories/#api-rest-api-3-project-category-post

Creates a project category

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ProjectCategory $response */
$response = $client->createProjectCategory(new Schema\ProjectCategory(
    description: 'Created Project Category',
    name: 'CREATED',
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectCategory`](/docs/schema/project-category.md)

A project category.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the project category. |
| `id` | `string` | The ID of the project category. |
| `name` | `string` | The name of the project category. Required on create, optional on update. |
| `self` | `string` | The URL of the project category. |

#### Response

Source: [`Jira\Client\Schema\ProjectCategory`](/docs/schema/project-category.md)

A project category.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the project category. |
| `id` | `string` | The ID of the project category. |
| `name` | `string` | The name of the project category. Required on create, optional on update. |
| `self` | `string` | The URL of the project category. |


## Get Project Category By ID
<a name="getProjectCategoryById"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-categories/#api-rest-api-3-project-category-id-get

Returns a project category

**"Permissions" required:** Permission to access Jira.

### Example

```php
/** @var Schema\ProjectCategory $response */
$response = $client->getProjectCategoryById(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | The ID of the project category. |

#### Response

Source: [`Jira\Client\Schema\ProjectCategory`](/docs/schema/project-category.md)

A project category.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the project category. |
| `id` | `string` | The ID of the project category. |
| `name` | `string` | The name of the project category. Required on create, optional on update. |
| `self` | `string` | The URL of the project category. |


## Update Project Category
<a name="updateProjectCategory"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-categories/#api-rest-api-3-project-category-id-put

Updates a project category

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var Schema\UpdatedProjectCategory $response */
$response = $client->updateProjectCategory(
    request: new Schema\ProjectCategory(
        description: 'Updated Project Category',
        name: 'UPDATED',
    )
    id: 1234,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectCategory`](/docs/schema/project-category.md)

A project category.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the project category. |
| `id` | `string` | The ID of the project category. |
| `name` | `string` | The name of the project category. Required on create, optional on update. |
| `self` | `string` | The URL of the project category. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` |  |

#### Response

Source: [`Jira\Client\Schema\UpdatedProjectCategory`](/docs/schema/updated-project-category.md)

A project category.

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The name of the project category. |
| `id` | `string` | The ID of the project category. |
| `name` | `string` | The description of the project category. |
| `self` | `string` | The URL of the project category. |


## Delete Project Category
<a name="removeProjectCategory"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-categories/#api-rest-api-3-project-category-id-delete

Deletes a project category

**"Permissions" required:** *Administer Jira* "global permission".
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->removeProjectCategory(
    id: 1234,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `id` | `int` | ID of the project category to delete. |

#### Response

`true`
