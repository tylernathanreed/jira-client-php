# Project Features

DummyDescription

Source: [`Jira\Client\Operations\ProjectFeatures`](/src/Operations/ProjectFeatures.php)

## Operations

- [Get Project Features](#getFeaturesForProject)
- [Set Project Feature State](#toggleFeatureForProject)

## Get Project Features
<a name="getFeaturesForProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-features/#api-rest-api-3-project-project-id-or-key-features-get

Returns the list of features for a project.

### Example

```php
/** @var Schema\ContainerForProjectFeatures $response */
$response = $client->getFeaturesForProject(
    projectIdOrKey: 'foo',
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The ID or (case-sensitive) key of the project. |

#### Response

Source: [`Jira\Client\Schema\ContainerForProjectFeatures`](/docs/schema/container-for-project-features.md)

The list of features on a project.

| Property | Type | Description |
| --- | --- | --- |
| `features` | [`?list<ProjectFeature>`](/docs/schema/project-feature.md) | The project features. |


## Set Project Feature State
<a name="toggleFeatureForProject"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-project-features/#api-rest-api-3-project-project-id-or-key-features-feature-key-put

Sets the state of a project feature.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ContainerForProjectFeatures $response */
$response = $client->toggleFeatureForProject(
    request: new Schema\ProjectFeatureState(
        state: 'ENABLED',
    )
    projectIdOrKey: 'foo',
    featureKey: 'foo',
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ProjectFeatureState`](/docs/schema/project-feature-state.md)

Details of the feature state.

| Property | Type | Description |
| --- | --- | --- |
| `state` | `'ENABLED'\|`<br/>`'DISABLED'\|`<br/>`'COMING_SOON'\|`<br/>`null` | The feature state. |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `projectIdOrKey` | `string` | The ID or (case-sensitive) key of the project. |
| `featureKey` | `string` | The key of the feature. |

#### Response

Source: [`Jira\Client\Schema\ContainerForProjectFeatures`](/docs/schema/container-for-project-features.md)

The list of features on a project.

| Property | Type | Description |
| --- | --- | --- |
| `features` | [`?list<ProjectFeature>`](/docs/schema/project-feature.md) | The project features. |
