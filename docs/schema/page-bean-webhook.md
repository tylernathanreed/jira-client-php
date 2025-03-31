# Page Bean Webhook

A page of items.

Source: [`Jira\Client\Schema\PageBeanWebhook`](/src/Schema/PageBeanWebhook.php)

| Property | Type | Description |
| --- | --- | --- |
| `isLast` | `bool` | Whether this is the last page. |
| `maxResults` | `int` | The maximum number of items that could be returned. |
| `nextPage` | `string` | If there is another page of results, the URL of the next page. |
| `self` | `string` | The URL of the page. |
| `startAt` | `int` | The index of the first item returned. |
| `total` | `int` | The number of items returned. |
| `values` | `?list<[Webhook](/src/Schema/Webhook.php)>` | The list of items. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Webhooks](/docs/operations/webhooks.md) | [getDynamicWebhooksForApp](/docs/operations/webhooks.md#get-dynamic-webhooks-for-app) |

### Schema

*None*
