# JQL Functions Apps

DummyDescription

Source: [`Jira\Client\Operations\JQLFunctionsApps`](/src/Operations/JQLFunctionsApps.php)

## Operations

- [Get Precomputations (apps)](#getPrecomputations)
- [Update Precomputations (apps)](#updatePrecomputations)
- [Get Precomputations By ID (apps)](#getPrecomputationsByID)

## Get Precomputations (apps)
<a name="getPrecomputations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql-functions-apps/#api-rest-api-3-jql-function-computation-get

Returns the list of a function's precomputations along with information about when they were created, updated, and last used.
Each precomputation has a `value` \- the JQL fragment to replace the custom function clause with

**"Permissions" required:** This API is only accessible to apps and apps can only inspect their own functions

The new `read:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.

### Example

```php
/** @var Schema\PageBean2JqlFunctionPrecomputationBean $response */
$response = $client->getPrecomputations(
    functionKey: null,
    startAt: 0,
    maxResults: 100,
    orderBy: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `functionKey` | `?list<string>` | The function key in format:<br/><br/> *  Forge: `ari:cloud:ecosystem::extension/[App ID]/[Environment ID]/static/[Function key from manifest]`<br/> *  Connect: `[App key]__[Module key]` |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |
| `orderBy` | `?string` | [Order](#ordering) the results by a field:<br/><br/> *  `functionKey` Sorts by the functionKey.<br/> *  `used` Sorts by the used timestamp.<br/> *  `created` Sorts by the created timestamp.<br/> *  `updated` Sorts by the updated timestamp. |

#### Response

Source: [`Jira\Client\Schema\PageBean2JqlFunctionPrecomputationBean`](/docs/schema/page-bean2-jql-function-precomputation-bean.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<JqlFunctionPrecomputationBean>`](/docs/schema/jql-function-precomputation-bean.md) | The list of items. |


## Update Precomputations (apps)
<a name="updatePrecomputations"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql-functions-apps/#api-rest-api-3-jql-function-computation-post

Update the precomputation value of a function created by a Forge/Connect app

**"Permissions" required:** An API for apps to update their own precomputations

The new `write:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.


### Request

#### Request Body

Source: [`Jira\Client\Schema\JqlFunctionPrecomputationUpdateRequestBean`](/docs/schema/jql-function-precomputation-update-request-bean.md)

List of pairs (id and value) for precomputation updates.

| Property | Type | Description |
| --- | --- | --- |
| `values` | [`?list<JqlFunctionPrecomputationUpdateBean>`](/docs/schema/jql-function-precomputation-update-bean.md) |  |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `skipNotFoundPrecomputations` | `?bool` |  |

#### Response

Source: [`Jira\Client\Schema\JqlFunctionPrecomputationUpdateResponse`](/docs/schema/jql-function-precomputation-update-response.md)

Result of updating JQL Function precomputations.

| Property | Type | Description |
| --- | --- | --- |
| `notFoundPrecomputationIDs` | `?list<string>` | List of precomputations that were not found and skipped. Only returned if the request passed skipNotFoundPrecomputations=true. |


## Get Precomputations By ID (apps)
<a name="getPrecomputationsByID"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql-functions-apps/#api-rest-api-3-jql-function-computation-search-post

Returns function precomputations by IDs, along with information about when they were created, updated, and last used.
Each precomputation has a `value` \- the JQL fragment to replace the custom function clause with

**"Permissions" required:** This API is only accessible to apps and apps can only inspect their own functions

The new `read:app-data:jira` OAuth scope is 100% optional now, and not using it won't break your app.
However, we recommend adding it to your app's scope list because we will eventually make it mandatory.

### Example

```php
use Jira\Client\Schema;

/** @var Schema\JqlFunctionPrecomputationGetByIdResponse $response */
$response = $client->getPrecomputationsByID(
    request: new Schema\JqlFunctionPrecomputationGetByIdRequest(
        precomputationIDs: [
                'f2ef228b-367f-4c6b-bd9d-0d0e96b5bd7b',
                '2a854f11-d0e1-4260-aea8-64a562a7062a',
            ],
    )
    orderBy: null,
);
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\JqlFunctionPrecomputationGetByIdRequest`](/docs/schema/jql-function-precomputation-get-by-id-request.md)

Request to fetch precomputations by ID.

| Property | Type | Description |
| --- | --- | --- |
| `precomputationIDs` | `?list<string>` |  |

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `orderBy` | `?string` | [Order](#ordering) the results by a field:<br/><br/> *  `functionKey` Sorts by the functionKey.<br/> *  `used` Sorts by the used timestamp.<br/> *  `created` Sorts by the created timestamp.<br/> *  `updated` Sorts by the updated timestamp. |

#### Response

Source: [`Jira\Client\Schema\JqlFunctionPrecomputationGetByIdResponse`](/docs/schema/jql-function-precomputation-get-by-id-response.md)

Get precomputations by ID response.

| Property | Type | Description |
| --- | --- | --- |
| `notFoundPrecomputationIDs` | `?list<string>` | List of precomputations that were not found. |
| `precomputations` | [`?list<JqlFunctionPrecomputationBean>`](/docs/schema/jql-function-precomputation-bean.md) | The list of precomputations. |
