# Webhooks

Source: [`Jira\Client\Operations\Webhooks`](/src/Operations/Webhooks.php)

## Operations

- [Get Dynamic Webhooks For App](#getDynamicWebhooksForApp)
- [Register Dynamic Webhooks](#registerDynamicWebhooks)
- [Delete Webhooks By ID](#deleteWebhookById)
- [Get Failed Webhooks](#getFailedWebhooks)
- [Extend Webhook Life](#refreshWebhooks)

## Get Dynamic Webhooks For App
<a name="getDynamicWebhooksForApp"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-get

Returns a "paginated" list of the webhooks registered by the calling app

**"Permissions" required:** Only "Connect" and "OAuth 2.0" apps can use this operation.
See: https://developer.atlassian.com/cloud/jira/platform/#connect-apps
See: https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps

### Example

```php
/** @var Schema\PageBeanWebhook $response */
$response = $client->getDynamicWebhooksForApp(
    startAt: 0,
    maxResults: 100,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `startAt` | `?int` | The index of the first item to return in a page of results (page offset). |
| `maxResults` | `?int` | The maximum number of items to return per page. |

#### Response

Source: [`Jira\Client\Schema\PageBeanWebhook`](/docs/schema/page-bean-webhook.md)

A page of items.

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | [`?list<Webhook>`](/docs/schema/webhook.md) | The list of items. |


## Register Dynamic Webhooks
<a name="registerDynamicWebhooks"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-post

Registers webhooks

**NOTE:** for non-public OAuth apps, webhooks are delivered only if there is a match between the app owner and the user who registered a dynamic webhook

**"Permissions" required:** Only "Connect" and "OAuth 2.0" apps can use this operation.
See: https://developer.atlassian.com/cloud/jira/platform/#connect-apps
See: https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps

### Example

```php
use Jira\Client\Schema;

/** @var Schema\ContainerForRegisteredWebhooks $response */
$response = $client->registerDynamicWebhooks(new Schema\WebhookRegistrationDetails(
    url: 'https://your-app.example.com/webhook-received',
    webhooks: [
                [
                    'events' => [
                        'jira:issue_created',
                        'jira:issue_updated',
                    ],
                    'fieldIdsFilter' => [
                        'summary',
                        'customfield_10029',
                    ],
                    'jqlFilter' => 'project = PROJ',
                ],
                [
                    'events' => [
                        'jira:issue_deleted',
                    ],
                    'jqlFilter' => 'project IN (PROJ, EXP] AND status = done',
                ],
                [
                    'events' => [
                        'issue_property_set',
                    ],
                    'issuePropertyKeysFilter' => [
                        'my-issue-property-key',
                    ],
                    'jqlFilter' => 'project = PROJ',
                ],
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\WebhookRegistrationDetails`](/docs/schema/webhook-registration-details.md)

Details of webhooks to register.

| Property | Type | Description |
| --- | --- | --- |
| `url` | `string` | The URL that specifies where to send the webhooks. This URL must use the same base URL as the Connect app. Only a single URL per app is allowed to be registered. |
| `webhooks` | [`list<WebhookDetails>`](/docs/schema/webhook-details.md) | A list of webhooks. |

#### Response

Source: [`Jira\Client\Schema\ContainerForRegisteredWebhooks`](/docs/schema/container-for-registered-webhooks.md)

Container for a list of registered webhooks.
Webhook details are returned in the same order as the request.

| Property | Type | Description |
| --- | --- | --- |
| `webhookRegistrationResult` | [`?list<RegisteredWebhook>`](/docs/schema/registered-webhook.md) | A list of registered webhooks. |


## Delete Webhooks By ID
<a name="deleteWebhookById"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-delete

Removes webhooks by ID.
Only webhooks registered by the calling app are removed.
If webhooks created by other apps are specified, they are ignored

**"Permissions" required:** Only "Connect" and "OAuth 2.0" apps can use this operation.
See: https://developer.atlassian.com/cloud/jira/platform/#connect-apps
See: https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps


### Request

#### Request Body

Source: [`Jira\Client\Schema\ContainerForWebhookIDs`](/docs/schema/container-for-webhook-i-ds.md)

Container for a list of webhook IDs.

| Property | Type | Description |
| --- | --- | --- |
| `webhookIds` | `list<int>` | A list of webhook IDs. |

#### Response

`true`
## Get Failed Webhooks
<a name="getFailedWebhooks"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-failed-get

Returns webhooks that have recently failed to be delivered to the requesting app after the maximum number of retries

After 72 hours the failure may no longer be returned by this operation

The oldest failure is returned first

This method uses a cursor-based pagination.
To request the next page use the failure time of the last webhook on the list as the `failedAfter` value or use the URL provided in `next`

**"Permissions" required:** Only "Connect apps" can use this operation.
See: https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps

### Example

```php
/** @var Schema\FailedWebhooks $response */
$response = $client->getFailedWebhooks(
    maxResults: null,
    after: null,
);
```

### Request

#### Query Parameters

| Property | Type | Description |
| --- | --- | --- |
| `maxResults` | `?int` | The maximum number of webhooks to return per page. If obeying the maxResults directive would result in records with the same failure time being split across pages, the directive is ignored and all records with the same failure time included on the page. |
| `after` | `?int` | The time after which any webhook failure must have occurred for the record to be returned, expressed as milliseconds since the UNIX epoch. |

#### Response

Source: [`Jira\Client\Schema\FailedWebhooks`](/docs/schema/failed-webhooks.md)

A page of failed webhooks.

| Property | Type | Description |
| --- | --- | --- |
| `maxResults` | `int` | The maximum number of items on the page. If the list of values is shorter than this number, then there are no more pages. |
| `values` | [`list<FailedWebhook>`](/docs/schema/failed-webhook.md) | The list of webhooks. |
| `next` | `string` | The URL to the next page of results. Present only if the request returned at least one result.The next page may be empty at the time of receiving the response, but new failed webhooks may appear in time. You can save the URL to the next page and query for new results periodically (for example, every hour). |


## Extend Webhook Life
<a name="refreshWebhooks"></a>

Official Documentation: https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-refresh-put

Extends the life of webhook.
Webhooks registered through the REST API expire after 30 days.
Call this operation to keep them alive

Unrecognized webhook IDs (those that are not found or belong to other apps) are ignored

**"Permissions" required:** Only "Connect" and "OAuth 2.0" apps can use this operation.
See: https://developer.atlassian.com/cloud/jira/platform/#connect-apps
See: https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps

### Example

```php
use Jira\Client\Schema;

/** @var Schema\WebhooksExpirationDate $response */
$response = $client->refreshWebhooks(new Schema\ContainerForWebhookIDs(
    webhookIds: [
                '10000',
                '10001',
                '10042',
            ],
));
```

### Request

#### Request Body

Source: [`Jira\Client\Schema\ContainerForWebhookIDs`](/docs/schema/container-for-webhook-i-ds.md)

Container for a list of webhook IDs.

| Property | Type | Description |
| --- | --- | --- |
| `webhookIds` | `list<int>` | A list of webhook IDs. |

#### Response

Source: [`Jira\Client\Schema\WebhooksExpirationDate`](/docs/schema/webhooks-expiration-date.md)

The date the refreshed webhooks expire.

| Property | Type | Description |
| --- | --- | --- |
| `expirationDate` | `string` | The expiration date of all the refreshed webhooks. |
