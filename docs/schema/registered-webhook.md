# Registered Webhook

ID of a registered webhook or error messages explaining why a webhook wasn't registered.

Source: [`Jira\Client\Schema\RegisteredWebhook`](/src/Schema/RegisteredWebhook.php)

| Property | Type | Description |
| --- | --- | --- |
| `createdWebhookId` | `` | The ID of the webhook. Returned if the webhook is created. |
| `errors` | `?list<string>` | Error messages specifying why the webhook creation failed. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [ContainerForRegisteredWebhooks](/docs/schema/container-for-registered-webhooks.md) |
