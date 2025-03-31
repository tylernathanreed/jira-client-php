# Webhook

A webhook.

Source: [`Jira\Client\Schema\Webhook`](/src/Schema/Webhook.php)

| Property | Type | Description |
| --- | --- | --- |
| `events` | `list<string>` | The Jira events that trigger the webhook. |
| `id` | `` | The ID of the webhook. |
| `jqlFilter` | `` | The JQL filter that specifies which issues the webhook is sent for. |
| `expirationDate` | `` | The date after which the webhook is no longer sent. Use [Extend webhook life](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-webhooks/#api-rest-api-3-webhook-refresh-put) to extend the date. |
| `fieldIdsFilter` | `?list<string>` | A list of field IDs. When the issue changelog contains any of the fields, the webhook `jira:issue_updated` is sent. If this parameter is not present, the app is notified about all field updates. |
| `issuePropertyKeysFilter` | `?list<string>` | A list of issue property keys. A change of those issue properties triggers the `issue_property_set` or `issue_property_deleted` webhooks. If this parameter is not present, the app is notified about all issue property updates. |

## References

### Operations

*None*

### Schema

| Group | Operation |
| --- | --- |
| [PageBeanWebhook](/docs/schema/page-bean-webhook.md) |
