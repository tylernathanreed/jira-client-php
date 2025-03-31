# Failed Webhook

Details about a failed webhook.

Source: [`Jira\Client\Schema\FailedWebhook`](/src/Schema/FailedWebhook.php)

| Property | Type | Description |
| --- | --- | --- |
| `failureTime` | `int` | The time the webhook was added to the list of failed webhooks (that is, the time of the last failed retry). |
| `id` | `string` | The webhook ID, as sent in the `X-Atlassian-Webhook-Identifier` header with the webhook. |
| `url` | `string` | The original webhook destination. |
| `body` | `string` | The webhook body. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [FailedWebhooks](/docs/schema/failed-webhooks.md) |
