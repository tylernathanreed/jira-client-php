# Project Key And Name Validation

Source: [`Jira\Client\Operations\ProjectKeyAndNameValidation`](/src/Operations/ProjectKeyAndNameValidation.php)

## Operations

- [Validate Project Key](#validateProjectKey)
- [Get Valid Project Key](#getValidProjectKey)
- [Get Valid Project Name](#getValidProjectName)

## Validate Project Key
<a name="validateProjectKey"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-key-and-name-validation/#api-rest-api-3-projectvalidate-key-get

Validates a project key by confirming the key is a valid string and not in use

**"Permissions" required:** None.

### Example

```php
/** @var Schema\ErrorCollection $response */
$response = $client->validateProjectKey(
    key: 'HSP',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `key` | `?string` | The project key. |

#### Response

Source: [`Jira\Client\Schema\ErrorCollection`](/docs/schema/error-collection.md)

Error messages from an operation.

| Property | Type | Description |
| --- | --- | --- |
| `errorMessages` | `?list<string>` | The list of error messages produced by this operation. For example, "input parameter 'key' must be provided" |
| `errors` | `array<string,string>` | The list of errors by parameter returned by the operation. For example,"projectKey": "Project keys must start with an uppercase letter, followed by one or more uppercase alphanumeric characters." |
| `status` | `int` |  |


## Get Valid Project Key
<a name="getValidProjectKey"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-key-and-name-validation/#api-rest-api-3-projectvalidate-valid-project-key-get

Validates a project key and, if the key is invalid or in use, generates a valid random string for the project key

**"Permissions" required:** None.

### Example

```php
/** @var true $response */
$response = $client->getValidProjectKey(
    key: 'HSP',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `key` | `?string` | The project key. |

#### Response

`true`
## Get Valid Project Name
<a name="getValidProjectName"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-key-and-name-validation/#api-rest-api-3-projectvalidate-valid-project-name-get

Checks that a project name isn't in use.
If the name isn't in use, the passed string is returned.
If the name is in use, this operation attempts to generate a valid project name based on the one supplied, usually by adding a sequence number.
If a valid project name cannot be generated, a 404 response is returned

**"Permissions" required:** None.

### Example

```php
/** @var true $response */
$response = $client->getValidProjectName(
    name: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The project name. |

#### Response

`true`
