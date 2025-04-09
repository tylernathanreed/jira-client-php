# Notification Scheme Payload

The payload for creating a notification scheme.
The user has to supply the ID for the default notification scheme.
For CMP this is provided in the project payload and should be left empty, for TMP it's provided using this payload

Source: [`Jira\Client\Schema\NotificationSchemePayload`](/src/Schema/NotificationSchemePayload.php)

| Property | Type | Description |
| --- | --- | --- |
| `description` | `string` | The description of the notification scheme |
| `name` | `string` | The name of the notification scheme |
| `notificationSchemeEvents` | [`?list<NotificationSchemeEventPayload>`](/docs/schema/notification-scheme-event-payload.md) | The events and notifications for the notification scheme |
| `onConflict` | `'FAIL'\|'USE'\|'NEW'\|null` | The strategy to use when there is a conflict with an existing entity |
| `pcri` | [`ProjectCreateResourceIdentifier`](/docs/schema/project-create-resource-identifier.md) |  |

## References

### Operations

*None*

### Schema

| Schema |
| --- |
| [CustomTemplateRequestDTO](/docs/schema/custom-template-request-dto.md) |
