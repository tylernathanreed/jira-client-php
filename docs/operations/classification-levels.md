# Classification Levels

DummyDescription

Source: [`Jira\Client\Operations\ClassificationLevels`](/src/Operations/ClassificationLevels.php)

## Operations

- [Get All Classification Levels](#getAllUserDataClassificationLevels)

## Get All Classification Levels
<a name="getAllUserDataClassificationLevels"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-classification-levels/#api-rest-api-3-classification-levels-get

Returns all classification levels

**"Permissions" required:** None.

### Example

```php
/** @var Schema\DataClassificationLevelsBean $response */
$response = $client->getAllUserDataClassificationLevels(
    status: null,
    orderBy: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `status` | `?list<'PUBLISHED'\|'ARCHIVED'\|'DRAFT'>` | Optional set of statuses to filter by. |
| `orderBy` | `'rank'\|'-rank'\|'+rank'\|null` | Ordering of the results by a given field. If not provided, values will not be sorted. |

#### Response

Source: [`Jira\Client\Schema\DataClassificationLevelsBean`](/docs/schema/data-classification-levels-bean.md)

The data classification.

| Property | Type | Description |
| --- | --- | --- |
| `classifications` | [`?list<DataClassificationTagBean>`](/docs/schema/data-classification-tag-bean.md) | The data classifications. |
