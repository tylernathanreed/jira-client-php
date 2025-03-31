# Failed Webhook

Details about a failed webhook.

Source: [`Jira\Client\Schema\FailedWebhook`](/src/Schema/FailedWebhook.php)

| Property | Type | Description |
| --- | --- | --- |
| `failureTime` | `` | The time the webhook was added to the list of failed webhooks (that is, the time of the last failed retry). |
| `id` | `` | The webhook ID, as sent in the `X-Atlassian-Webhook-Identifier` header with the webhook. |
| `url` | `` | The original webhook destination. |
| `body` | `` | The webhook body. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [FailedWebhooks](/docs/schema/failed-webhooks.md) |
