# Labels

Source: [`Jira\Client\Operations\Labels`](/src/Operations/Labels.php)

## Operations

- [Get All Labels](#getAllLabels)

## Get All Labels
<a name="getAllLabels"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-labels/#api-rest-api-3-label-get

Returns a "paginated" list of labels.

### Example

```php
/** @var Schema\PageBeanString $response */
$response = $client->getAllLabels(
    startAt: 0,
    maxResults: 1000,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanString`](/docs/schema/page-bean-string.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<string>` | The list of items. |
