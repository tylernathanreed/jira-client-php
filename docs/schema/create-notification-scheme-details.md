# Create Notification Scheme Details

Details of an notification scheme.

Source: [`Jira\Client\Schema\CreateNotificationSchemeDetails`](/src/Schema/CreateNotificationSchemeDetails.php)

| Property | Type | Description |
| --- | --- | --- |
| `name` | `` | The name of the notification scheme. Must be unique (case-insensitive). |
| `description` | `` | The description of the notification scheme. |
| `notificationSchemeEvents` | `?list<NotificationSchemeEventDetails>` | The list of notifications which should be added to the notification scheme. |

## References

### Operations

| Group | Operation |
| --- | --- |
| [IssueNotificationSchemes](/docs/operations/issue-notification-schemes.md) | [createNotificationScheme](/docs/operations/issue-notification-schemes.md#create-notification-scheme) |

### Schema

*None*
