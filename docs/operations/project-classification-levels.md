# Project Classification Levels

Source: [`Jira\Client\Operations\ProjectClassificationLevels`](/src/Operations/ProjectClassificationLevels.php)

## Operations

- [Get The Default Data Classification Level Of A Project](#getDefaultProjectClassification)
- [Update The Default Data Classification Level Of A Project](#updateDefaultProjectClassification)
- [Remove The Default Data Classification Level From A Project](#removeDefaultProjectClassification)

## Get The Default Data Classification Level Of A Project
<a name="getDefaultProjectClassification"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-classification-levels/#api-rest-api-3-project-project-id-or-key-classification-level-default-get

Returns the default data classification for a project

**"Permissions" required:**

 - *Browse Projects* "project permission" for the project
 - *Administer projects* "project permission" for the project
 - *Administer jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->getDefaultProjectClassification(
    projectIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case-sensitive). |

#### Response

`true`
## Update The Default Data Classification Level Of A Project
<a name="updateDefaultProjectClassification"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-classification-levels/#api-rest-api-3-project-project-id-or-key-classification-level-default-put

Updates the default data classification level for a project

**"Permissions" required:**

 - *Administer projects* "project permission" for the project
 - *Administer jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
use Jira\Client\Schema;

/** @var true $response */
$response = $client->updateDefaultProjectClassification(
    request: new Schema\UpdateDefaultProjectClassificationBean(
        id: 'ari:cloud:platform::classification-tag/dec24c48-5073-4c25-8fef-9d81a992c30c',
    )
    projectIdOrKey: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\UpdateDefaultProjectClassificationBean`](/docs/schema/update-default-project-classification-bean.md)

The request for updating the default project classification level.

| Property | Type | Description |
| --- | --- | --- |
| `id` | `string` | The ID of the project classification. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case-sensitive). |

#### Response

`true`
## Remove The Default Data Classification Level From A Project
<a name="removeDefaultProjectClassification"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-classification-levels/#api-rest-api-3-project-project-id-or-key-classification-level-default-delete

Remove the default data classification level for a project

**"Permissions" required:**

 - *Administer projects* "project permission" for the project
 - *Administer jira* "global permission".
See: https://confluence.atlassian.com/x/yodKLg
See: https://confluence.atlassian.com/x/x4dKLg

### Example

```php
/** @var true $response */
$response = $client->removeDefaultProjectClassification(
    projectIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The project ID or project key (case-sensitive). |

#### Response

`true`
