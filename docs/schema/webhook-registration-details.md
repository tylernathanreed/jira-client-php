# Webhook Registration Details

Details of webhooks to register.

Source: [`Jira\Client\Schema\WebhookRegistrationDetails`](/src/Schema/WebhookRegistrationDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `url` | `string` | The URL that specifies where to send the webhooks. This URL must use the same base URL as the Connect app. Only a single URL per app is allowed to be registered. |
| `webhooks` | [`list<WebhookDetails>`](/docs/schemas/webhook-details.md) | A list of webhooks. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [Webhooks](/docs/operations/webhooks.md) | [registerDynamicWebhooks](/docs/operations/webhooks.md#register-dynamic-webhooks) |

### Schema

*None*
