# Project Types

DummyDescription

Source: [`Jira\Client\Operations\ProjectTypes`](/src/Operations/ProjectTypes.php)

## Operations

- [Get All Project Types](#getAllProjectTypes)
- [Get Licensed Project Types](#getAllAccessibleProjectTypes)
- [Get Project Type By Key](#getProjectTypeByKey)
- [Get Accessible Project Type By Key](#getAccessibleProjectTypeByKey)

## Get All Project Types
<a name="getAllProjectTypes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-types/#api-rest-api-3-project-type-get

Returns all "project types", whether or not the instance has a valid license for each type

This operation can be accessed anonymously

**"Permissions" required:** None.
See: https://confluence.atlassian.com/x/Var1Nw

### Example

```php
/** @var array $response */
$response = $client->getAllProjectTypes();
```

### Request

#### Response


## Get Licensed Project Types
<a name="getAllAccessibleProjectTypes"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-types/#api-rest-api-3-project-type-accessible-get

Returns all "project types" with a valid license.
See: https://confluence.atlassian.com/x/Var1Nw

### Example

```php
/** @var array $response */
$response = $client->getAllAccessibleProjectTypes();
```

### Request

#### Response


## Get Project Type By Key
<a name="getProjectTypeByKey"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-types/#api-rest-api-3-project-type-project-type-key-get

Returns a "project type"

This operation can be accessed anonymously

**"Permissions" required:** None.
See: https://confluence.atlassian.com/x/Var1Nw

### Example

```php
/** @var Schema\ProjectType $response */
$response = $client->getProjectTypeByKey(
    projectTypeKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectTypeKey` | `'software'\|`<br/>`'service_desk'\|`<br/>`'business'\|`<br/>`'product_discovery'` | The key of the project type. |

#### Response

Source: [`Jira\Client\Schema\ProjectType`](/docs/schema/project-type.md)

Details about a project type.

| Property | Type | Description |
| --- | --- | --- |
| `color` | `string` | The color of the project type. |
| `descriptionI18nKey` | `string` | The key of the project type's description. |
| `formattedKey` | `string` | The formatted key of the project type. |
| `icon` | `string` | The icon of the project type. |
| `key` | `string` | The key of the project type. |


## Get Accessible Project Type By Key
<a name="getAccessibleProjectTypeByKey"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-types/#api-rest-api-3-project-type-project-type-key-accessible-get

Returns a "project type" if it is accessible to the user

**"Permissions" required:** Permission to access Jira.
See: https://confluence.atlassian.com/x/Var1Nw

### Example

```php
/** @var Schema\ProjectType $response */
$response = $client->getAccessibleProjectTypeByKey(
    projectTypeKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectTypeKey` | `'software'\|`<br/>`'service_desk'\|`<br/>`'business'\|`<br/>`'product_discovery'` | The key of the project type. |

#### Response

Source: [`Jira\Client\Schema\ProjectType`](/docs/schema/project-type.md)

Details about a project type.

| Property | Type | Description |
| --- | --- | --- |
| `color` | `string` | The color of the project type. |
| `descriptionI18nKey` | `string` | The key of the project type's description. |
| `formattedKey` | `string` | The formatted key of the project type. |
| `icon` | `string` | The icon of the project type. |
| `key` | `string` | The key of the project type. |
