# Notification Scheme Event Payload

The payload for creating a notification scheme event.
Defines which notifications should be sent for a specific event

Source: [`Jira\Client\Schema\NotificationSchemeEventPayload`](/src/Schema/NotificationSchemeEventPayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `event` | [`NotificationSchemeEventIDPayload`](/docs/schema/notification-scheme-event-id-payload.md) |  |
| `notifications` | [`?list<NotificationSchemeNotificationDetailsPayload>`](/docs/schema/notification-scheme-notification-details-payload.md) | The configuration for notification recipents |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [NotificationSchemePayload](/docs/schema/notification-scheme-payload.md) |
