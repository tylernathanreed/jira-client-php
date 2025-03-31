# Failed Webhooks

A page of failed webhooks.

Source: [`Jira\Client\Schema\FailedWebhooks`](/src/Schema/FailedWebhooks.php)

| Property | Type | Description |
| --- | --- | --- |
| `maxResults` | `int` | The maximum number of items on the page. If the list of values is shorter than this number, then there are no more pages. |
| `values` | [`list<FailedWebhook>`](/src/Schema/FailedWebhook.php) | The list of webhooks. |
| `next` | `string` | The URL to the next page of results. Present only if the request returned at least one result.The next page may be empty at the time of receiving the response, but new failed webhooks may appear in time. You can save the URL to the next page and query for new results periodically (for example, every hour). |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Webhooks](/docs/operations/webhooks.md) | [getFailedWebhooks](/docs/operations/webhooks.md#get-failed-webhooks) |

### Schema

*None*
