# Create Notification Scheme Details

Details of an notification scheme.

Source: [`Jira\Client\Schema\CreateNotificationSchemeDetails`](/src/Schema/CreateNotificationSchemeDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `string` | The name of the notification scheme. Must be unique (case-insensitive). |
| `description` | `string` | The description of the notification scheme. |
| `notificationSchemeEvents` | [`?list<NotificationSchemeEventDetails>`](/docs/schema/notification-scheme-event-details.md) | The list of notifications which should be added to the notification scheme. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [createNotificationScheme](/docs/operations/issue-notification-schemes.md#create-notification-scheme) |

### Schema

*None*
